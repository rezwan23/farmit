<?php

namespace App\Http\Controllers;

use App\Models\CarrierPost;
use App\Models\SellPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', ['user' => auth()->user()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    

    public function createFarmerPost(Request $request)
    {
        return Inertia::render('Admin/FarmerPosts', ['user' => auth()->user()]);
    }

    public function showFarmerPosts(Request $request)
    {
        return Inertia::render('Admin/AllFarmerPost', ['user' => auth()->user(), 'posts' => SellPost::where('user_id', auth()->user()->id)->get()]);
    }

    public function saveSellPost(Request $request)
    {
        $request->validate([
            'user_id' => 'required', 
            'product_name' => 'required', 
            'product_image' => 'required|image:max:220', 
            'details' => 'required', 
            'sell_price' => 'required', 
            'district_id' => 'required',
            'thana_id' => 'required', 
            'post_office_id' => 'required'
        ]);

        $image = $request->file('product_image')->store('posts');


        SellPost::create(array_merge($request->except('product_image'), ['product_image' => $image]));

        return response(['message' => 'Stored!']);
    }


    public function deletePost(SellPost $item)
    {
        Storage::delete($item->product_image);
        $item->delete();
        return response(['message' => 'Item Deleted!']);
    }

    public function createCarrierPost(Request $request)
    {
        return Inertia::render('Admin/CreateCarrierPost', ['user' => auth()->user()]);
    }

    public function myCarrierPost(Request $request)
    {
        // dd(CarrierPost::with('fromDistrict', 'toDistrict', 'fromThana', 'toThana', 'fromPostOffice', 'toPostOffice')->where('user_id', auth()->user()->id)->get());
        return Inertia::render('Admin/MyCarrierPost', [
            'user' => auth()->user(), 
            'posts' => CarrierPost::with('fromDistrict', 'toDistrict', 'fromThana', 'toThana', 'fromPostOffice', 'toPostOffice')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function saveCarrierPost(Request $request)
    {
        $request->validate([
            'user_id' => 'required', 
            'from_district_id' => 'required', 
            'from_thana_id' => 'required',
            'from_post_office_id' => 'required',
            'to_district_id' => 'required', 
            'to_thana_id' => 'required',
            'to_post_office_id' => 'required',
            'description' => 'required',
            'journey_date_and_time' => 'required'
        ]);


        CarrierPost::create($request->all());
        
        return response(['message' => 'Carrier Post Stored!']);
    }

    public function deleteCarrierPost(CarrierPost $item)
    {
        $item->delete();
        return response(['message' => 'Item Deleted!']);
    }
}
