<?php

namespace App\Http\Controllers;

use App\Models\CarrierPost;
use App\Models\CarrierRequestPost;
use App\Models\CarrierRequestPostResponse;
use App\Models\Distance;
use App\Models\District;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\PostOffice;
use App\Models\SellPost;
use App\Models\Thana;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        $posts = SellPost::with('user', 'district', 'thana');

        if ($request->filled('type')) {
            $posts->where('type', $request->type);
        }
        return view('frontend.index', [
            'posts' => $posts->get(),
            'carts' =>  \Cart::getContent(),
        ]);
    }

    public function showCarrierPosts(Request $request)
    {
        $posts = CarrierPost::with('user', 'fromDistrict', 'fromThana', 'fromPostOffice', 'toDistrict', 'toThana', 'toPostOffice');

        if ($request->from_district_id) {
            $posts->whereHas('fromDistrict', function ($query) use ($request) {
                $query->where('district_id', $request->from_district_id);
            });
        }
        if ($request->to_district_id) {
            $posts->whereHas('toDistrict', function ($query) use ($request) {
                $query->where('district_id', $request->to_district_id);
            });
        }

        return view('frontend.carrierpost', [
            'posts' => $posts->get(),
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
            'carrierPosts' => auth()->check() ? CarrierPost::where('user_id', auth()->user()->id)->get() : [],
        ]);
    }

    public function addCarrierToCart(CarrierPost $item)
    {
        $carts = \Cart::getContent()->toArray();
        // dd($carts);
        $item->load('fromDistrict', 'toDistrict');

        $totalWeight = 0;

        array_walk($carts, function ($val, $key) use (&$totalWeight) {
            if ($key != -1) {
                $totalWeight += $val['attributes']['item']['weight'] * $val['quantity'];
            }
        });

        $distance = Distance::where('from', $item->fromDistrict->name)
            ->where('to', $item->toDistrict->name)->first()->distance;


            if($distance <= 100){
                $ratio = .05;
            }else if($distance > 100 && $distance <= 200){
                $ratio = .06;
            }else if($distance > 200 && $distance <= 300){
                $ratio = .05;
            }else{
                $ratio = .04;
            }

        $amount = $totalWeight * $distance * $ratio;

            dd($amount);
            // if ($amount <= 100) {
        //     $amount = 100;
        // } else {
        //     $amount = ceil($amount);
        // }
        $carrier = \Cart::get(-1);
        if (!$carrier) {
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

    public function respondToRequest(Request $request)
    {
        $request->validate(['carrier_post_id' => 'required']);
        // dd($request->all());

        CarrierRequestPostResponse::create($request->all());

        $post = CarrierRequestPost::find($request->carrier_request_post_id);
        $mobile = $post->load('user')->user->phone_no;
        // dd($mobile);

        $text = "Someone has responded to your carry request post! Follow \n" . route('carrierPosts');

        $text = urlencode($text);

        $url = "http://66.45.237.70/api.php?username=rezwan23&password=3YFRB4VD&number=$mobile&message=$text";

        $smsresult = file_get_contents("$url");

        return back();
    }

    public function contactUs()
    {
        return view('frontend.contactus', [
            'carts' =>  \Cart::getContent(),
        ]);
    }

    public function saveFeedback(Request $request)
    {
        Feedback::create($request->all());
        return back();
    }

    public function myFarmerOrders()
    {
        $orders = Order::with('carrier','carrier.user')->whereHas('orderDetails.sellPost', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->whereHas('carrier')->get();
        // dd($orders);
        return view('frontend.farmerorders', [
            'orders' => $orders,
            'carts' => \Cart::getContent(),
        ]);
    }

    public function handOverToCarrier(Order $order)
    {   
        $order->update(['status' => "Handed Over"]);

        // Buyer SMS

        $mobileNumbers = $order->load('user')->user->phone_no;

        $text = "Your Order is Being Handed Over!";

        $text = urlencode($text);



        $url = "http://66.45.237.70/api.php?username=rezwan23&password=3YFRB4VD&number=$mobileNumbers&message=$text";

        $smsresult = file_get_contents("$url");

        return back();
    }

    public function myByuerOrders()
    {
        $orders = Order::with('carrier','carrier.user')->where('user_id', auth()->user()->id)->get();
        // dd($orders);
        return view('frontend.buyerorders', [
            'orders' => $orders,
            'carts' => \Cart::getContent(),
        ]);
    }

    public function deliveryInit()
    {
        return view('frontend.deliveryinit', [
            'carts' => \Cart::getContent(),
        ]);
    }


    public function delivery(Request $request)
    {
        $order = Order::with('carrier', 'carrier.user')->findOrFail($request->order_id);

        $carrierMobile = $order->carrier->user->phone_no;
        // dd($carrierMobile);

        abort_if($carrierMobile != $request->phone_no, 404);

        if($request->otp){
            abort_if($order->carrier->otp != $request->otp, 404);

            $order->update(['status' => 'Delivered!']);
            return back();
        }else{
            // Buyer SMS
            $mobileNumbers = $order->carrier->user->phone_no;
            $text = "OTP :".$order->carrier->otp;
            $text = urlencode($text);
    
    
    
            $url = "http://66.45.237.70/api.php?username=rezwan23&password=3YFRB4VD&number=$mobileNumbers&message=$text";

            $smsresult = file_get_contents("$url");

            return redirect()->route('buyer.orders');
        }
    }

}
