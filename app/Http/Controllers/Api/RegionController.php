<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;



/**
 * @group  location management
 *
 * APIs for display location
 *  @urlParam {{ getcities/id }} required The ID of the Region Example:2
 *  @urlParam {{ getdistrict/id }} required The ID of the City Example:2
 */

class RegionController extends Controller
{
    public function GetRegions(){

        try {

            $regions=Region::all();
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' => $regions,

            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message'=>$exception->getMessage()],

            ], 500);
        }

    }
    public function GetCities($id){
        try {

            $cities = Region::find($id)->City;
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' => $cities,

            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message'=>$exception->getMessage()],

            ], 500);
        }

    }

    public function GetDistrict($id){

        try {
            $districts = City::find($id)->Districts;

            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' => $districts,

            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message'=>$exception->getMessage()],

            ], 500);
        }

    }


}
