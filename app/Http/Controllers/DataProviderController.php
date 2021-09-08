<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\PostOffice;
use App\Models\Thana;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataProviderController extends Controller
{

    public function provide(Request $request)
    {
        dd($request->all());

        if(!method_exists($this, "get".$request->get('provider'))){
            return response(['message' => 'Data Not Found!'], 422);
        }

        return $this->{'get'.$request->get('provider')}($request);
    }

    public function getThanaAndPostOffices($request)
    {
        $thanas = Thana::query();
        $postOffices = PostOffice::query();

        if($request->filled('district_id')){
            $thanas->where('district_id', $request->district_id);
            $postOffices->where('district_id', $request->district_id);
        }

        return [
            'thanas'    =>  $thanas->get(),
            'postOffices'   =>   $postOffices->get(),
        ];
    }

    public function getDistricts()
    {
        return District::all();
    }
}
