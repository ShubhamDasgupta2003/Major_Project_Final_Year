<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amb_info;
use Illuminate\Support\Facades\Http;
class AmbInfoPageController extends Controller
{
    //
    public function showAmbulanceServices()
    {
        $amb_data = Amb_info::all();
        // return view('amb_ptn_home',compact('amb_data'));
        return compact('amb_data');
    }

    public function fetchDistance()
    {
        $amb_coords = Amb_info::get(['amb_no','amb_loc_lat','amb_loc_lng'])->toArray();
        foreach($amb_coords as $records)
        {
            echo $records['amb_loc_lat'];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://distanceto.p.rapidapi.com/distance/route?car=true', 
            [
                'body' => '{
                    "route": [
                        {
                            "country": "India",
                            "name": 
                        },
                        {
                            "country": "India",
                            "name": "Kalyani"
                        }
                    ]
                }',
                'headers' => [
                    'X-RapidAPI-Host' => 'distanceto.p.rapidapi.com',
                    'X-RapidAPI-Key' => '74917a86afmsh4f718d674aad79dp15387cjsn8a9b3900ae7e',
                    'content-type' => 'application/json',
                ],
            ]);
            
            $response = (array)json_decode($response->getBody());
            $response = (array)$response['route'];
            $response = (array)$response['car'];
            echo '<br>';
            echo $response['distance'];
        }
        
    }

}
