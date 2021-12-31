<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Banner;

class BannerController extends Controller
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
            'banner' => 'Banner',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );

        return view('backoffice.landing.banner.index',$data);
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
            'banner' => 'Banner',
            'create' => 'Create Banner',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
        );
        
        return view('backoffice.landing.banner.create',$data);
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
            'title' => 'required|max:70',
            'content' => 'required|max:255',
            'files' => 'required',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Do not enter more than 70 characters.',
            'content.required' => 'Please Input Content',
            'content.max' => 'Do not enter more than 255 characters.',
            'files.required' => 'Please Input Images',
        ]);

        DB::beginTransaction();
        try {
            if($request->hasFile('files')) {
                $path = 'slide/';
                $uploadedFile = $request->file('files');
                $filename = time().'_'.$uploadedFile->getClientOriginalName();

                $path_fildename =  $path.$filename;
    
                Storage::disk('public')->putFileAs(
                    $path,
                    $uploadedFile,
                    $filename
                 );
            }else{
                $path_fildename = "https://via.placeholder.com/1280x853.png";
            }

            $banner = Banner::create([
                'title' => $request->title,
                'content' => $request->content,
                'images' =>$path_fildename,
            ]);

            DB::commit();
            return redirect(url('backoffice/banner/index'))->with('success', 'Banner data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/banner/index'))->with('error', "Can't save data!!");
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
        $banner = Banner::find($id);

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Banner',
            'create' => 'Edit Banner',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'banner' => $banner
        );
        

        return view('backoffice.landing.banner.edit',$data);
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
            'title' => 'required|max:70',
            'content' => 'required|max:255',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Do not enter more than 70 characters.',
            'content.required' => 'Please Input Content',
            'content.max' => 'Do not enter more than 255 characters.',
        ]);

        DB::beginTransaction();
        try {
            $banner = Banner::find($id);
            $banner->title = $request->title;
            $banner->content = $request->content;

            if($request->hasFile('files')) {
                Storage::disk('public')->delete($banner->images);

                $path = 'slide/';
                $uploadedFile = $request->file('files');
                $filename = time().'_'.$uploadedFile->getClientOriginalName();

                $path_fildename =  $path.$filename;
    
                Storage::disk('public')->putFileAs(
                    $path,
                    $uploadedFile,
                    $filename
                 );

                 $banner->images = $path_fildename;
            }
            $banner->save();

            DB::commit();
            return redirect(url('backoffice/banner/index'))->with('success', 'Banner data update successfully!!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect(url('backoffice/banner/index'))->with('error', "Can't save data!!");
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
            $banner = Banner::find($id);
            Storage::disk('public')->delete($banner->images);
            
            $banner = Banner::destroy($id);
           

            DB::commit();
            return response()->json([
                'status' => true,
                'massege' => "Delete Banner successfully!!",
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'massege' => "Can't delete data!!"
            ]);
        }
    }

    public function bannerdatatables(){
        $data = Banner::orderBy('id', 'desc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('content', function($row){
                    return $row->content;
                })
                ->addColumn('images', function($row){
                    if($row->images == null){
                        return "<img src='https://via.placeholder.com/250x200/'>"; 
                    }else{
                        return "<img src='".asset('local/public/storage').'/'.$row->images."' width='50px'>"; 
                    }
                
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url('backoffice/banner/edit').'/'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> ';
                    $btn .= '<button class="edit btn btn-danger btn-sm delete_banner" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['content','images','action'])
                ->make(true);
   }
}
