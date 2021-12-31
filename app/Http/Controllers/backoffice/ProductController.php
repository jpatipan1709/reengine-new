<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Product;
use App\Category;
use App\Album;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = array(
            'home' => 'Home',
            'product' => 'Product',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );

        return view('backoffice.landing.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $breadcrumb = array(
            'home' => 'Home',
            'product' => 'Product',
            'create' => 'Create Product',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'category' => $category,
        );
        
        return view('backoffice.landing.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'category_id' => 'required',
            'price' => 'required',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Do not enter more than 100 characters.',
            'category_id.required' => 'Please Select Category',
            'price.required' => 'Please Input Price',

        ]);

        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name              = $request->title;
            $product->description       = $request->content;
            $product->sku               = $request->sku;
            $product->quantity          = $request->quantity;
            $product->category_id       = $request->category_id;
            $product->price_original    = $request->original_price;
            $product->price             = $request->price;
            $product->density           = $request->density;
            $product->sheetcost         = $request->sheetcost;
            $product->spare             = $request->spare;
            $product->status            = 0;
            $product->save();

            if($request->hasFile('files')) {
                $path = 'product/';
                $uploadedFiles = $request->file('files');
                foreach($uploadedFiles as $uploadedFile){
                    $filename = time().'_'.$uploadedFile->getClientOriginalName();

                    $path_fildename =  $path.$filename;
            
                    Storage::disk('public')->putFileAs(
                        $path,
                        $uploadedFile,
                        $filename
                    );

                    $album = new Album();
                    $album->images      = $path_fildename;
                    $album->product_id  = $product->id;
                    $album->save();
                }
              
            }
            DB::commit();
            return redirect(url('backoffice/product/index'))->with('success', 'Product data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/product/index'))->with('error', "Can't save data!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $albums = Album::where('product_id',$id)->get();
        $category = Category::all();
        $breadcrumb = array(
            'home' => 'Home',
            'product' => 'Product',
            'create' => 'Create Product',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'category' => $category,
            'product' => $product,
            'albums' => $albums,
        );
        
        return view('backoffice.landing.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'category_id' => 'required',
            'price' => 'required',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Do not enter more than 100 characters.',
            'category_id.required' => 'Please Select Category',
            'price.required' => 'Please Input Price',

        ]);

        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->name              = $request->title;
            $product->description       = $request->content;
            $product->sku               = $request->sku;
            $product->quantity          = $request->quantity;
            $product->category_id       = $request->category_id;
            $product->price_original    = $request->original_price;
            $product->price             = $request->price;
            $product->density           = $request->density;
            $product->sheetcost         = $request->sheetcost;
            $product->spare             = $request->spare;
            $product->save();

            if($request->hasFile('files')) {
                $path = 'product/';
                $uploadedFiles = $request->file('files');
                foreach($uploadedFiles as $uploadedFile){
                    $filename = time().'_'.$uploadedFile->getClientOriginalName();

                    $path_fildename =  $path.$filename;
            
                    Storage::disk('public')->putFileAs(
                        $path,
                        $uploadedFile,
                        $filename
                    );

                    $album = new Album();
                    $album->images      = $path_fildename;
                    $album->product_id  = $id;
                    $album->save();
                }
              
            }
            DB::commit();
            return redirect(url('backoffice/product/edit/'.$id))->with('success', 'Product data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/product/index'.$id))->with('error', "Can't save data!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
           

            $albums = Album::where('product_id',$id)->get();
            foreach($albums as $album){
                Storage::disk('public')->delete($album->images);
            }

            $product = Product::destroy($id);
           
            DB::commit();
            return response()->json([
                'status' => true,
                'massege' => "Delete Product successfully!!",
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'massege' => "Can't delete data!!"
            ]);
        }
    }

    public function select()
    {

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Product List',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );

        return view('backoffice.landing.product.select',$data);
    }


    public function delete($id){
        DB::beginTransaction();
        try {
            $album = Album::find($id);
            Storage::disk('public')->delete($album->images);
            
            $album = Album::destroy($id);
           
            DB::commit();
            return response()->json([
                'status' => true,
                'massege' => "Delete Images successfully!!",
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'massege' => "Can't delete data!!"
            ]);
        }
    }

    public function selectitem(Request $request, $id){
        return response()->json([
            'status' => $request->status,
            'massege' => $request->id
        ]);
    }

    public function productdatatables(){
        $data = Product::orderBy('id', 'desc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('images', function($row){
                    // return $row->album;
                    if($row->album == null){
                        return "<img src='https://via.placeholder.com/150x100/'>"; 
                    }else{
                        return "<img src='".asset('local/public/storage').'/'.$row->album->images."' width='50px'>"; 
                    }
                })
                ->addColumn('description', function($row){
                    return $row->description;
                })
                ->addColumn('category', function($row){
                    return $row->category->categoryname;
                })
                ->addColumn('created_at', function($row){
                    return $row->created_at;
                })
                ->addColumn('updated_at', function($row){
                    return $row->updated_at;
                })
                ->addColumn('select', function($row){
                    if($row->status == 1){
                        return ' <label class="switch"><input type="checkbox" checked> <span class="slider round selectitem" data-id="'.$row->id.'"></span> </label>';
                    }else{
                        return ' <label class="switch"><input type="checkbox"> <span class="slider round selectitem" data-id="'.$row->id.'"></span> </label>';
                    }
                   
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url('backoffice/product/custom').'/'.$row->id.'" class="custom btn btn-success btn-sm">ปรับแต่ง</a> ';
                    $btn .= '<a href="'.url('backoffice/product/edit').'/'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> ';
                    $btn .= '<button class="edit btn btn-danger btn-sm delete_product" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['select','images','description','action'])
                ->make(true);
   }


}
