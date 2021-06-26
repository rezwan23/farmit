<?php

namespace App\Http\Controllers;

use App\Models\SellPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
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

        // dd($request->all());

        SellPost::create(array_merge($request->except('product_image'), ['product_image' => $image]));

        return response(['message' => 'Stored!']);
    }


    public function deletePost(SellPost $item)
    {
        Storage::delete($item->product_image);
        $item->delete();
        return response(['message' => 'Item Deleted!']);
    }
}
