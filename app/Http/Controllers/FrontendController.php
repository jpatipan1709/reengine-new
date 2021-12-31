<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\About;
use App\Product;
use App\Contact;
use App\Footer;
use App\Category;

use Cart;
use Session;
class FrontendController extends Controller
{
    public function index(){
        $banner = Banner::all();
        $abouts = About::orderBy('id','desc')->limit(1)->first();
        $category = Category::all();
        $contact = Contact::orderBy('id','desc')->limit(1)->first();
        $product = Product::limit(15)->get();

        $data = array(
            'banners' => $banner,
            'abouts' => $abouts,
            'contact' => $contact,
            'category' => $category,
            'products' => $product
        );

        return view('index',$data);
    }


    public function product(){
        $category = Category::all();
        $contact = Contact::orderBy('id','desc')->limit(1)->first();
        $product = Product::paginate(15);

        $breadcrumb = array(
            'home' => 'หน้าแรก',
            'product' => 'สินค้า'
        );

        $data = array(
            'category' => $category,
            'contact' => $contact,
            'products' =>  $product,
            'breadcrumb' =>  $breadcrumb
        );

        // dd($data);
        return view('product',$data);
    }


    public function  productdetail($id){
        $product = Product::find($id);
        $contact = Contact::orderBy('id','desc')->limit(1)->first();
        $category = Category::all();

        $breadcrumb = array(
            'home' => 'หน้าแรก',
            'product' => 'สินค้า',
            'product_detail' =>  $product->name
        );

        $data = array(
            'category' => $category,
            'contact' => $contact,
            'breadcrumb' =>  $breadcrumb,
            'product' => $product

        );

        return view('product_detail',$data);
    }

    public function cart(){
        $category = Category::all();
        $contact = Contact::orderBy('id','desc')->limit(1)->first();

        $breadcrumb = array(
            'home' => 'หน้าแรก',
            'product' => 'ตะกร้าสินค้า',
        );

        $data = array(
            'breadcrumb' =>  $breadcrumb,
            'category' => $category,
            'contact' => $contact,
        );

        return view('cart',$data);
    }


    public function addcart(Request $request){

        $product = Product::find($request->id);

        Cart::add(array(
            'id' =>$product->id,
            'name' => $product->name,
            'price' => $request->price,
            'quantity' => $request->qty,
            'attributes' => array(),
            'associatedModel' => $product
        ));

      
    }

    public function removecart(Request $request){
        $remove = Cart::remove($request->id);

        return $remove;
    }

    public function updatecart(Request $request){
        if($request->value <= 0){
            $update = Cart::remove($request->id);
        }else{
            $update = Cart::update($request->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->value
                ),
              ));
    
        }
        
        return $update;
    }

    
}
