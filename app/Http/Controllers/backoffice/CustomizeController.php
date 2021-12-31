<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use DataTables;
use App\Product;
use App\Componant;
use App\Material;
class CustomizeController extends Controller
{
    
    public function index($id){

        $product = Product::find($id);
        $componants = Componant::where('product_id',$id)->get();
        $materials = Material::where('product_id',$id)->get();
        
        $breadcrumb = array(
            'home' => 'Home',
            'product' => 'Customize',
        );

        $data = array (
            'breadcrumb' => $breadcrumb,
            'product' => $product,
            'componants' => $componants,
            'materials' => $materials
        );
      
        return view('backoffice.landing.customize.index',$data);
    }
}
