<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Kosor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashBoardController extends Controller
{
    public function index(){
        return view('home');

    }
    public function Profile(){
        return view('Admin.customer.profile');
    }
    public function Details(){
        $id=AdminGuard()->user()->id;
        $kosor=Kosor::where('admin_id',$id)->first();
        $images=Kosor::find($kosor->id)->GetImages;
        $menHalls=Kosor::find($kosor->id)->MenHalls;
        $womenHalls=Kosor::find($kosor->id)->WomenHalls;
        return view('admin.customer.details',['kosor'=>$kosor,'images'=>$images,'menHalls'=>$menHalls,'womenHalls'=>$womenHalls]);

    }
    public function ChangePass(Request $request){
        $id=AdminGuard()->user()->id;
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);
        $admin =Admin::find($id);
        $admin->password= Hash::make($request['password']);
        if($admin->save()) {
            session()->flash("success", "تم التعديل  بنجاح ");
            return back();
        }

    }

}
