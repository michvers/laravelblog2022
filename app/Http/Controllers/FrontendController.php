<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::all();
        $products = Product::with(['productcategory', 'photo', 'brand'])->get();
        return view('shop', compact('products', 'brands'));

    }

    public function productsPerBrand($id)
    {
        $brands = Brand::all();
        $products = Product::with(['productcategory','photo','brand'])->where('brand_id', $id)->get();
        return view('shop', compact('products','brands'));
    }

    public function addToCart($id)
    {
        $product = Product::with(['productcategory','photo','brand'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function cart(){
        if(!Session::has('cart')){
            return redirect('/shop');
        }else{
            $currentCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($currentCart);
            $cart = $cart->products;
            return view('checkout',compact('cart'));
        }
    }

    public function updateQuantity(Request $request){
        //dd($request);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($request->id, $request->quantity);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }
}
