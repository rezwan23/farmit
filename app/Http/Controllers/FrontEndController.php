<?php

namespace App\Http\Controllers;

use App\Models\CarrierPost;
use App\Models\CarrierRequestPost;
use App\Models\SellPost;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'posts' => SellPost::with('user', 'district', 'thana')->get(),
            'carts' =>  \Cart::getContent(),
        ]);
    }

    public function showCarrierPosts()
    {
        return view('frontend.carrierpost', [
            'posts' => CarrierPost::with('user', 'fromDistrict', 'fromThana', 'fromPostOffice', 'toDistrict', 'toThana', 'toPostOffice')->get(),
            'carts' =>  \Cart::getContent(),
        ]);
    }

    public function addToCart(SellPost $item)
    {  
        \Cart::add($item->id, $item->product_name, $item->sell_price, 1, ['item' => $item]);
        return back();
    }

    public function removeCart($item)
    {
        \Cart::remove($item);
        return back();
    }

    public function showCarrierRequestPosts()
    {
        return view('frontend.carrierrequestpost', [
            'posts' => CarrierRequestPost::with('user', 'fromDistrict', 'fromThana', 'fromPostOffice', 'toDistrict', 'toThana', 'toPostOffice')->get(),
            'carts' =>  \Cart::getContent(),
        ]);
    }   
}
