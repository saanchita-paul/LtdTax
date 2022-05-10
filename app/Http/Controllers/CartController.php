<?php

namespace App\Http\Controllers;

use App\Models\BookPackage;
use App\Models\District;
use App\Models\Division;
use App\Models\Training;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{   
    public function addtoTrainingCart(){
        $title = 'Training Cart';
        $meta_img = '';
        $description = '';
        $content = Cart::content();
        if(count($content) > 0){
            foreach($content as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'train-cart')
                {
                    return redirect('/cart');
                }
                else{
                    return view('pages.training-cart', compact('content', 'title', 'description', 'meta_img'));
                }
            }
        }
        else{
            return redirect('/');
        }
        
    }
    public function trainingCart(Request $request, $id){
        $training = Training::where('id', $id)->first();
        // dd($training->price);
        $qty = 1;
        $data = array();
        // if (!empty($training->price)) {
            $data['id'] = $training->id;
            $data['name'] = $training->title;
            $data['price'] = $training->regular_price;
            $data['qty'] = $qty;
            $data['weight'] = 0;
            $data['options']['sale_price'] = $training->price;
            $data['options']['cart_type'] = 'train-cart';
            $data['options']['image'] = $training->train_img;
        // } 
      
        $productCount = 0;
        $e =Cart::content();
        if(count($e) > 0){
            foreach($e as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'train-cart'){
                    Cart::destroy();
                    break;
                }
                else{
                    if($c->id == $training->id){
                        $productCount++;
                    }
                }
            }
        }
        if($productCount==0){
            $d=Cart::add($data);
        }
        return redirect('/training-cart');
    }
    public function addtocart()
    {
        $title = 'Cart';
        $meta_img = '';
        $description = '';
        $content = Cart::content();
        if(count($content) > 0){
            foreach($content as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'book-cart')
                {
                    return redirect('/training-cart');
                }
                else{
                    return view('pages.cart', compact('content', 'title', 'description', 'meta_img'));
                }
            }
        }
        else{
            return redirect('/');
        }
       
       
    }
    public function index(Request $request, $id)
    {
        $book_package = BookPackage::where('id', $id)->first();
        if ($request->qty != '') {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }
        $data = array();
        if (!empty($book_package->price)) {
            $data['id'] = $book_package->id;
            $data['name'] = $book_package->package_name;
            $data['price'] = $book_package->regular_price;
            $data['qty'] = $qty;
            $data['weight'] = 0;
            $data['options']['sale_price'] = $book_package->price;
            $data['options']['cart_type'] = 'book-cart';
            $data['options']['image'] = $book_package->package_img;
        }
        $e =Cart::content();
        if(count($e) > 0){
            foreach($e as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'book-cart')
                {
                    Cart::destroy();
                    break;
                }
            }
        }
        Cart::add($data);
        return redirect('/cart');
    }
    public function removecart($rowId)
    {
        Cart::remove($rowId);
        if(Cart::count() > 0){
            return back();
        }
        else{
            return redirect('/');
        }
        
    }
    public function updatecart(Request $request)
    {
        $rowId = array();
        $qty = array();
        foreach ($request->qty as $key => $value) {
            array_push($rowId, $request->rowId[$key]);
            $qty = $request->qty;
        }
        foreach ($qty as $key => $value) {
            Cart::update($rowId[$key], $value);
        }
        return back();
    }
    public function cartallremove()
    {
        Cart::destroy();
        return redirect('/');
    }
    public function checkout()
    {
        $division = Division::all();
        $title = 'Checkout';
        $meta_img = '';
        $description = '';
        $content = Cart::content();
        if(count($content) > 0){
            foreach($content as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'book-cart')
                {
                    return redirect('/train_checkout');
                }
                else{
                    return view('pages.checkout', compact('content', 'division','title', 'description', 'meta_img'));
                }
            }
        }
        else{
            return redirect('/');
        }
        
        return view('pages.checkout', compact('content', 'division', 'title', 'description', 'meta_img'));
    }
    public function train_checkout()
    {
        $division = Division::all();
        $title = 'Checkout';
        $meta_img = '';
        $description = '';
        $content = Cart::content();
        if(count($content) > 0){
            foreach($content as $c){
                if(!empty($c->options['cart_type']) && $c->options['cart_type'] != 'train-cart')
                {
                    return redirect('/checkout');
                }
                else{
                    return view('pages.train_checkout', compact('content', 'division','title', 'description', 'meta_img'));
                }
            }
        }
        else{
            return redirect('/');
        }        
    }
    public function getdistrict($id)
    {
        $dist = District::where('division_id', $id)->get();
        return json_encode($dist);
    }
    public function sgetdistrict($id)
    {
        $dist = District::where('division_id', $id)->get();
        return json_encode($dist);
    }
}
