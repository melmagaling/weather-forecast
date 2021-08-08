<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function get(Request $request)
    {   
        $response = Http::get(config('openweather.api_url'), [
            'appid' => config('openweather.api_key'),
            'cnt' => 5,
            'q' => $request->city,
            'units' => 'metric'
        ]);  

        if ($response->failed()) {
            return response($response, $response->status());
        }

        return response($response, $response->status());
    }
}
