<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Banner;

class FrontendController extends Controller
{
    public function index(){
        return view('backoffice.index');
    }

    public function dashboard(){
        return view('backoffice.dashboard');
    }

    public function banner(){
        
        return view('backoffice.landing.banner.index',$data);
    }

    public function aboutus(){
        return view('backoffice.landing.aboutus.index');
    }

    public function product(){
        return view('backoffice.landing.product.index');
    }

    public function contact(){
        return view('backoffice.landing.contact.index');
    }

    public function footer(){
        return view('backoffice.landing.footer.index');
    }
}
