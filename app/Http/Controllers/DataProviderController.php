<?php

namespace App\Http\Controllers;

use App\Models\District;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataProviderController extends Controller
{

    public function provide(Request $request)
    {

        if(!method_exists($this, "get{$request->provider}")){
            return response(['message' => 'Data Not Found!'], 422);
        }

        return $this->{'get'.$request->provider}($request);
    }

    public function getDistricts()
    {
        return District::all();
    }
}
