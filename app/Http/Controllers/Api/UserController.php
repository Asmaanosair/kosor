<?php

namespace App\Http\Controllers\Api;


use App\Booking;
use App\Events\OrderEvent;
use App\Http\Controllers\Controller;
use App\Kosor;
use App\MenHall;
use App\Order;
use App\Review;
use App\WomenHall;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use DB;
use Moyasar\Moyasar;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{

    /**
     * @group  location management
     *
     * APIs for display location
     *  @urlParam {{ register}} Post Request  Example:2
     *  @urlParam {{ login}} Post Request phone_number Example:2
     *  @urlParam {{ getdistrict/id }} required The ID of the City Example:2
     */
   public function Register(Request $request)
   {
       $validation = Validator::make($request->all(), [
           'name' => 'required|string|max:255',
           'phone_number' => 'required|numeric|unique:users',
           'other_phone' => 'numeric',
           'number_id' => 'required|numeric|unique:users',
           'email' => 'required|string|email|max:255|unique:users',

       ]);

       try {
           if ($validation->fails()) {
               $errors = $validation->errors();
               return response()->json([
                   'code' => '0',
                   'status' => 'error',
                   'error_message' => $errors
               ], 400);
           }
           $user = User::create([
               'code' =>  $request->get('code'),
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'phone_number' => $request->get('phone_number'),
               'other_phone' => $request->get('other_phone'),
               'number_id' => $request->get('number_id'),
           ]);

           return response()->json([
               'code' => '1',
               'status' => 'success',
               'data' => $user,

           ], 201);

       } catch (\Exception $exception) {
           return response()->json([
               'code' => '0',
               'status' => 'failed',
               'data' => ['message' => $exception->getMessage()],

           ], 500);
       }
   }
   public function Login(Request $request)
   {
       $validation = Validator::make($request->all(), [
           'phone_number' => 'required|numeric',
       ]);

       try {
           if ($validation->fails()) {
               $errors = $validation->errors();
               return response()->json([
                   'code' => '0',
                   'status' => 'error',
                   'error_message' => $errors
               ], 400);
           }
           $user=User::where('phone_number',$request->get('phone_number'))->where('isVerified','1')->first();
           if(!$user){
               return response()->json([
                   'code' => '0',
                   'status' => 'The User Not Found',
                   'data' => ['message' => 'The User Not Found'],

               ], 401);
           }
           $token =JWTAuth::fromUser($user);

           return response()->json([
               'code' => '1',
               'status' => 'success',
               'data' =>compact('token','user') ,
           ], 201);


       } catch (\Exception $exception) {
           return response()->json([
               'code' => '0',
               'status' => 'failed',
               'data' => ['message' => $exception->getMessage()],

           ], 500);
       }
   }

    public function VerificationCode($id,$code)
    {
        try {

            $user=User::find($id);
            if($code!==$user->code){
                return response()->json([
                    'code' => '0',
                    'status' => 'error',
                    'data' => ['message' => 'Invalid Code'],
                ], 400);
            }
             $user->isVerified=1;
             $user->save();
             $token =JWTAuth::fromUser($user);
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>compact('user','token') ,

            ], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message' => $exception->getMessage()],

            ], 500);
        }

    }
    public function SaveOrder(Request $request)
    {
        $validation = Validator::make($request->all(), [
             'booking_date' => 'required|string|max:255',
             'payment_method' => 'string|max:255',
             'lat' => 'string|max:255',
             'long' => 'string|max:255',
             'amount_paid' => 'required|string|max:255',
             'kosor_id' => 'required|numeric',
        ]);

try {
           if ($validation->fails()) {
               $errors = $validation->errors();
               return response()->json([
                   'code' => '0',
                   'status' => 'error',
                   'error_message' => $errors
              ], 400);
          }
            $user = auth('api')->user()->id;
            $order=new Order();
            $order->booking_date=$request->booking_date;
            $order->user_id=$user;
            $order->payment_method=$request->payment_method;
            $order->amount_paid=$request->amount_paid;
            $order->kosor_id=$request->kosor_id;
            $order->lat=$request->lat;
            $order->long=$request->long;
            $order->save();
            event(new  OrderEvent($order));
           return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>$order,
           ], 201);

       } catch (\Exception $exception) {
         return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message' => $exception->getMessage()],

            ], 500);
       }

    }
    public function Booking()
    {
        try {
            $user = auth('api')->user()->id;
            $booking=DB::table('orders')->where('user_id',$user)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('kosors', 'orders.kosor_id', '=', 'kosors.id')
                ->select('kosors.name','kosors.image','kosors.price',
                    'kosors.description','kosors.id','orders.status','orders.note',
                    'users.email','orders.booking_date','orders.payment_method','orders.amount_paid')
                ->get();

            $arrayWomenHalls=[];
            $arrayMenHalls=[];


            foreach ($booking as $key=>$value){
                $womenHalls=WomenHall::select('name')->where('kosor_id',$value->id)->get();
                $menHalls=MenHall::select('name')->where('Kosor_id',$value->id)->get();

                foreach ($womenHalls as $row){
                    array_push($arrayWomenHalls,$row->name);
                }
                foreach ($menHalls as $row){
                    array_push($arrayMenHalls,$row->name);
                }
                $booking[$key]->women_halls=$arrayWomenHalls;
                $booking[$key]->men_halls=$arrayMenHalls;
            }
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>$booking ,
            ], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message' => $exception->getMessage()],

            ], 500);
        }

    }
    public function BookingDetails($id)
    {
        try {
            $booking=DB::table('orders')->where('orders.id',$id)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('kosors', 'orders.kosor_id', '=', 'kosors.id')
                ->select('kosors.name','kosors.image','kosors.price','orders.*','users.email')
                ->get();

            $kosor_id=$booking[0]->kosor_id;
            $arrayWomenHalls=[];
            $arrayMenHalls=[];
            $womenHalls=WomenHall::select('name')->where('kosor_id',$kosor_id)->get();
            $menHalls=MenHall::select('name')->where('Kosor_id',$kosor_id)->get();

            foreach ($womenHalls as $row){
                array_push($arrayWomenHalls,$row->name);
            }
            foreach ($menHalls as $row){
                array_push($arrayMenHalls,$row->name);
            }

            $booking[0]->women_halls=$arrayWomenHalls;
            $booking[0]->men_halls=$arrayMenHalls;
            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>$booking ,
            ], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message' => $exception->getMessage()],

            ], 500);
        }

    }
    public function Review( Request $request)
    {
        $validation = Validator::make($request->all(), [
            'rate' => 'required|numeric',
            'kosor_id' => 'required|numeric',
        ]);

        $user = auth('api')->user()->id;
        try {
            if ($validation->fails()) {
                $errors = $validation->errors();
                return response()->json([
                    'code' => '0',
                    'status' => 'error',
                    'error_message' => $errors
                ], 400);
            }
            $review = Review::create([
                'user_id' =>$user,
                'kosor_id' => $request->get('kosor_id'),
                'rate' =>  $request->get('rate'),
            ]);

            return response()->json([
                'code' => '1',
                'status' => 'success',
                'data' =>$review ,
            ], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'code' => '0',
                'status' => 'failed',
                'data' => ['message' => $exception->getMessage()],

            ], 500);
        }

    }
    public  function MadaPayment(Request $request){


        $paymentService = new \Moyasar\Providers\PaymentService();

        $paymentService->create([
            'amount' => 1000000,
            'currency' => 'SAR',
            'username' => 'Asmaanosair5',

        ]);

     return   $paymentService;
    }
}
