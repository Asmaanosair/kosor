<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\District;
use App\Http\Controllers\Controller;
use App\Kosor;
use App\KosorImage;
use App\MenHall;
use App\WomenHall;
use Illuminate\Http\Request;
use DB;
/**
 * @group  Kosor management
 *
 * APIs for display Kosors
 *  @urlParam {{ getall/id }} required The ID of the District Example:2
 *  @urlParam {{ getsingle/id }} required The ID of the Kosor Example:2
 *  @urlParam {{ getbooking/id }} required The ID of the Kosor Example:2
 *  @urlParam {{ getsingle/id }} required The ID of the Kosor Example:2
 */

class KosorController extends Controller
{
 public function GetAll($id){

     try {
         $data = cd

         return response()->json([
             'code' => '1',
             'status' => 'success',
             'data' =>$data ,
         ], 200);

     }catch (\Exception $exception){
         return response()->json([
             'code' => '0',
             'status' => 'failed',
             'data' => ['message'=>$exception->getMessage()],

         ], 500);
     }
 }
    public function GetSingle($id){
        try {
            $arrayImages=[];
            $arrayWomenHalls=[];
            $arrayMenHalls=[];
            $details=Kosor::find($id);
            $images=KosorImage::select('image')->where('Kosor_id',$id)->get();
            $womenHalls=WomenHall::select('name')->where('Kosor_id',$id)->get();
            $menHalls=MenHall::select('name')->where('Kosor_id',$id)->get();
            foreach ($images as $row){
                array_push($arrayImages,$row->image);
            }
            foreach ($womenHalls as $row){
                array_push($arrayWomenHalls,$row->name);
            }
            foreach ($menHalls as $row){
                array_push($arrayMenHalls,$row->name);
            }
            $details['images']=$arrayImages;
            $details['women_halls']=$arrayWomenHalls;
            $details['men_halls']=$arrayMenHalls;
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>$details

            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message'=>$exception->getMessage()],

            ], 500);
        }
    }
    public function GetBooking($id){
        try {

            $data = Kosor::find($id)->Booking;
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' => $data,

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
