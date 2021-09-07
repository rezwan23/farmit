<?php

namespace App\Http\Controllers;

use App\Models\CarrierPost;
use App\Models\CarrierRequestPost;
use App\Models\Distance;
use App\Models\District;
use App\Models\PostOffice;
use App\Models\SellPost;
use App\Models\Thana;
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

    public function showCarrierPosts(Request $request)
    {
        $posts = CarrierPost::with('user', 'fromDistrict', 'fromThana', 'fromPostOffice', 'toDistrict', 'toThana', 'toPostOffice');

        if($request->from_district_id){
            $posts->whereHas('fromDistrict', function($query)use($request){
                $query->where('district_id', $request->from_district_id);
            });
        }
        if($request->to_district_id){
            $posts->whereHas('toDistrict', function($query)use($request){
                $query->where('district_id', $request->to_district_id);
            });
        }

        return view('frontend.carrierpost', [
            'posts' =>$posts->get(),
            'carts' =>  \Cart::getContent(),
            'districts' => District::all(),
            'thanas' => Thana::all(),
            'postOffices'   =>  PostOffice::all(),
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

    public function addCarrierToCart(CarrierPost $item)
    {
        $carts = \Cart::getContent()->toArray();
        // dd($carts);
        $item->load('fromDistrict', 'toDistrict');

        $totalWeight = 0;

        array_walk($carts, function($val, $key) use(&$totalWeight) {
            if($key != -1){
                $totalWeight += $val['attributes']['item']['weight'] * $val['quantity'];
            }
        });

        $distance = Distance::where('from', $item->fromDistrict->name)
        ->where('to', $item->toDistrict->name)->first()->distance;

        $amount = $totalWeight * $distance * .1;

        if($amount <= 100){
            $amount = 100;
        }else{
            $amount = ceil($amount);
        }
        $carrier = \Cart::get(-1);
        if(!$carrier){
            \Cart::add(-1, 'carrier-post', $amount, 1, ['item' => $item->load('user')]);
        }
        return back();
    }

    public function clearCart()
    {
        \Cart::clear();
        return back();
    }

    public function checkout()
    {
        return view('frontend.checkout', ['carts' => \Cart::getContent()]);
    }

    public function reduceCartItem($item)
    {
        \Cart::update($item, ['quantity' => -1]);
        return back();
    }
}
