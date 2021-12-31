<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();

        $breadcrumb = array(
            'home' => 'Home',
            'banner' => 'Contact',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'contact' => $contact,
        );

        return view('backoffice.landing.contact.index',$data);
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
            'workinghours' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ],
        [
            'workinghours.required' => 'Please Input Working Hours',
            'telephone.required' => 'Please Input Telephone',
            'email.required' => 'Please Input Email',
            'email.email' => 'Please Input Email format',
            'address.required' => 'Please Input Address',
        ]);
        DB::beginTransaction();
        try {
            if($request->type == 'edit'){
                $contact = Contact::find($request->id); 
                $contact->workinghours  = $request->workinghours;
                $contact->telephone     = $request->telephone;
                $contact->email         = $request->email;
                $contact->address       = $request->address;
                $contact->save();
            }else{
                $contact = Contact::create([
                    'workinghours'  =>  $request->workinghours,
                    'telephone'     =>  $request->telephone,
                    'email'         =>  $request->email,
                    'address'       =>  $request->address,
                ]);
            }
           
            DB::commit();
            return redirect(url('backoffice/contact/index'))->with('success', 'Contact data saved successfully.!!');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect(url('backoffice/contact/index'))->with('error', "Can't save data!!");
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
