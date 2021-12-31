<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'About',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'about' => $about,
        );

        return view('backoffice.landing.aboutus.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'content' => 'required',
        ],
        [
            'title.required' => 'Please Input Title',
            'title.max' => 'Do not enter more than 70 characters.',
            'content.required' => 'Please Input Content',
        ]);

     
        DB::beginTransaction();
        try {
            if($request->type == 'edit'){
                $about = About::find($request->id); 
                $about->title = $request->title;
                $about->content = $request->content;

                if($request->hasFile('files')) {
                    Storage::disk('public')->delete($about->images);

                    $path = 'about/';
                    $uploadedFile = $request->file('files');
                    $filename = time().'_'.$uploadedFile->getClientOriginalName();
    
                    $path_fildename =  $path.$filename;
        
                    Storage::disk('public')->putFileAs(
                        $path,
                        $uploadedFile,
                        $filename
                     );

                    $about->images = $path_fildename;
                }

                $about->save();
            }else{
                if($request->hasFile('files')) {
                    $path = 'about/';
                    $uploadedFile = $request->file('files');
                    $filename = time().'_'.$uploadedFile->getClientOriginalName();
    
                    $path_fildename =  $path.$filename;
        
                    Storage::disk('public')->putFileAs(
                        $path,
                        $uploadedFile,
                        $filename
                     );
                }else{
                    $path_fildename = NULL;
                }
    
                $banner = About::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'images' =>$path_fildename,
                ]);
            }
           

            DB::commit();
            return redirect(url('backoffice/aboutus/index'))->with('success', 'AboutUs data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/aboutus/index'))->with('error', "Can't save data!!");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aboutdatatables(){
        $data = about::orderBy('id', 'desc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('content', function($row){
                    return $row->content;
                })
                ->addColumn('images', function($row){
                    if($row->images == null){
                        return "<img src='https://via.placeholder.com/150x100/'>"; 
                    }else{
                        return "<img src='".asset('storage').'/'.$row->images."' width='150'>"; 
                    }
                
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="" class="edit btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-eye"></i></a> ';
                    $btn .= '<a href="'.url('backoffice/about/edit').'/'.$row->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> ';
                    $btn .= '<button class="edit btn btn-danger btn-sm delete_about" data-id="'.$row->id.'"><i class="fa fa-trash-o"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['content','images','action'])
                ->make(true);
   }
}
