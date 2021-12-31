<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Footer;
use App\Category;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::all();
        $category = Category::all();

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Footer',
        );

        if(count($footer) > 0){
            $ex_category = explode(',',$footer[0]->category);
        }else{
            $ex_category = array();
        }
        $data = array (
            'breadcrumb' => $breadcrumb,
            'footer' => $footer,
            'category' => $category,
            'ex_category' => $ex_category
        );

        return view('backoffice.landing.footer.index',$data);
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
            'companyname' => 'required|max:150',
            'telephone' => 'required|max:13',
        ],
        [
            'companyname.required' => 'Please Input Company Name',
            'companyname.max' => 'Do not enter more than 150 characters.',
            'telephone.required' => 'Please Input Telephone',
            'telephone.max' => 'Do not enter more than 13 characters.',
        ]);

        DB::beginTransaction();
        try {
            if($request->type == 'edit'){
                if($request->myselect != null){
                    $im_category = implode(",",$request->myselect);
                }else{
                    $im_category = array();
                }

                $footer = Footer::find($request->id); 
                $footer->companyname    = $request->companyname;
                $footer->telephone      = $request->telephone;
                $footer->category       = $im_category;
                $footer->facebook       = $request->facebook;
                $footer->twitter        = $request->twitter;
                $footer->instagrame     = $request->instagrame;

                $footer->save();
            }else{
                if($request->myselect != null){
                    $im_category = implode(",",$request->myselect);
                }else{
                    $im_category = array();
                }
              
                $banner = Footer::create([
                    'companyname'       => $request->companyname,
                    'telephone'         => $request->telephone,
                    'category'          => $im_category,
                    'facebook'          => $request->facebook,
                    'twitter'           => $request->twitter,
                    'instagrame'        => $request->instagrame,
                ]);
            }
           

            DB::commit();
            return redirect(url('backoffice/footer/index'))->with('success', 'Footer data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/footer/index'))->with('error', "Can't save data!!");
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
}
