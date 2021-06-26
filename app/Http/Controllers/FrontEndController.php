<?php

namespace App\Http\Controllers;

use App\Models\SellPost;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.index', ['posts' => SellPost::with('user', 'district', 'thana')->get()]);
    }
}
