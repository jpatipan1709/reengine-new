<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Category;


class CategoryController extends Controller
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
            'banner' => 'Category',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );

        return view('backoffice.landing.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Category',
            'create' => 'Create Category',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );
        
        return view('backoffice.landing.category.create',$data);
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
            'category' => 'required|max:70',
        ],
        [
            'category.required' => 'Please Input Title',
            'category.max' => 'Do not enter more than 70 characters.',
        ]);

        DB::beginTransaction();
        try {
            $category = Category::create([
                'categoryname' => $request->category,
            ]);

            DB::commit();
            return redirect(url('backoffice/category/index'))->with('success', 'Category data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/category/index'))->with('error', "Can't save data!!");
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
        $category = Category::find($id);

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Category',
            'create' => 'Edit Category',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'category' => $category
        );
        

        return view('backoffice.landing.category.edit',$data);
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
            'category' => 'required|max:70',
        ],
        [
            'category.required' => 'Please Input Title',
            'category.max' => 'Do not enter more than 70 characters.',
        ]);

        DB::beginTransaction();
        try {
            $category = Category::find($id);
            $category->categoryname = $request->category;
            $category->save();

            DB::commit();
            return redirect(url('backoffice/category/index'))->with('success', 'Category data update successfully!!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(url('backoffice/category/index'))->with('error', "Can't save data!!");
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
            $category = Category::destroy($id);
           
            DB::commit();
            return response()->json([
                'status' => true,
                'massege' => "Delete Category successfully!!",
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'massege' => "Can't delete data!!"
            ]);
        }
    }

    public function categorydatatables(){
        $data = Category::orderBy('id', 'desc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url('backoffice/category/edit').'/'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> ';
                    $btn .= '<button class="edit btn btn-danger btn-sm delete_category" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
   }
}
