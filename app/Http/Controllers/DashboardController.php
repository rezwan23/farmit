<?php

namespace App\Http\Controllers;

use App\Models\CarrierPost;
use App\Models\CarrierRequestPost;
use App\Models\Feedback;
use App\Models\SellPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $posts = SellPost::query();
        if (auth()->user()->type != 'admin') {
            $posts->where('user_id', auth()->user()->id);
        }

        return Inertia::render('Admin/AllFarmerPost', ['user' => auth()->user(), 'posts' => $posts->get()]);
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
        $posts = CarrierPost::with('fromDistrict', 'toDistrict', 'fromThana', 'toThana', 'fromPostOffice', 'toPostOffice');

        if (auth()->user()->type != 'admin') {
            $posts->where('user_id', auth()->user()->id);
        }
        return Inertia::render('Admin/MyCarrierPost', [
            'user' => auth()->user(),
            'posts' => $posts->get()
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

    public function carryPostRequest()
    {
        return Inertia::render('Admin/CreateCarryRequestPost', [
            'user' => auth()->user(),
        ]);
    }


    public function saveCarrierRequestPost(Request $request)
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
        


        CarrierRequestPost::create($request->all());

        return response(['message' => 'Carrier Post Stored!']);
    }

    public function myCarrierRequestPost(Request $request)
    {
        $posts = CarrierRequestPost::with('fromDistrict', 'toDistrict', 'fromThana', 'toThana', 'fromPostOffice', 'toPostOffice');

        if (auth()->user()->type != 'admin') {
            $posts->where('user_id', auth()->user()->id);
        }

        return Inertia::render('Admin/MyCarrierRequestPost', [
            'user' => auth()->user(),
            'posts' => $posts->get(),
        ]);
    }

    public function deleteCarrierRequestPost(CarrierRequestPost $item)
    {
        $item->delete();
        return response(['message' => 'Item Deleted!']);
    }

    public function createAdminUser()
    {
        return Inertia::render('Admin/CreateAdminUser', [
            'user' => auth()->user(),
        ]);
    }

    public function saveAdminUser(Request $request)
    {
        $request->validate([
            'name'  =>  'required',
            'email' =>  'required',
            'password'  =>  'required',
            'phone_no'  =>  'required',
            'nid'   =>  'required',
            'type'  =>  'required',
        ]);

        User::create(array_merge($request->except('password'), ['password' => Hash::make($request->password)]));

        $url = "http://66.45.237.70/api.php";
        $number = "88017,88018,88019";
        $text = "Hello Bangladesh";
        $data = array(
            'username' => "rezwan23",
            'password' => "3YFRB4VD",
            'number' => "{$request->phone_no}",
            'message' => "Hi {$request->name}! your user name : {$request->email} and password is : {$request->password}"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);

        return response(['message' => 'User Created!']);
    }

    public function allUsers(Request $request)
    {
        
        return Inertia::render('Admin/AllUsers', [
            'user' => auth()->user(),
            'users' => User::all(),
        ]);
    }

    public function deleteUser(User $item)
    {
        $item->delete();
        return response(['message' => 'User Deleted!']);
    }

    public function allFeedback()
    {
        return Inertia::render('Admin/AllFeedback', ['feedbacks' => Feedback::all(),'user' => auth()->user()]);
    }
}
