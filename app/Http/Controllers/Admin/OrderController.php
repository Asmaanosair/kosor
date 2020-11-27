<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderEvent;
use App\Http\Controllers\Controller;
use App\Kosor;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        if(AdminGuard()->user()->role=='customer'){
            $id=AdminGuard()->user()->id;
            $kosor=Kosor::where('admin_id',$id)->first()->id;
//            $orders=Order::where('kosor_id',$kosor)->get();
            $orders = DB::table('orders')->where('kosor_id',$kosor)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('kosors', 'orders.kosor_id', '=', 'kosors.id')
                ->select('users.phone_number', 'kosors.name', 'orders.*')
                ->get();
            return response()->json(compact('orders'));
        }else {

            $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('kosors', 'orders.kosor_id', '=', 'kosors.id')
                ->select('users.phone_number', 'kosors.name', 'orders.*')
                ->get();
            return response()->json(compact('orders'));
        }
    }

    public function edit($id)
    {
        $orders=Order::find($id);
        return response()->json([$orders]);
    }
    public function update(Request $request, $id)
    {
        $orders =Order::find($id);
        $orders->note= $request->note;
        $orders->status= $request->status;
        $orders->save();
        return response()->json($orders);
    }
}
