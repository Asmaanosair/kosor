<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Kosor;
use App\KosorImage;
use Illuminate\Http\Request;
use DB;

class KosorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kosor=Kosor::all();
        $district=District::all();
        $admin=Admin::all()->where('role','customer');
        return view('Admin.kosor.showAll',['kosor'=>$kosor,'district'=>$district,'admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
             'name' => 'required|string|max:255',
             'price' => 'required|string|max:255',
             'num_hall' => 'required|string|max:255',
             'num_people' => 'required|string|max:255',
             'location' => 'required|string',
             'description' => 'required|string',
             'service_description' => 'required|string',
             'districtId' => 'required',
             'adminId' => 'required',
             'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
        $kosor = new Kosor();
        $kosor->name= $request->name;
        $kosor->district_id= $request->districtId;
        $kosor->admin_id= $request->adminId;
        $kosor->price= $request->price;
        $kosor->num_hall= $request->num_hall;
        $kosor->num_people= $request->num_people;
        $kosor->location= $request->location;
        $kosor->description= $request->description;
        $kosor->service_description= $request->service_description;
        if($request->image!=null)
        {
            $filName=time().".".$request->image->getClientOriginalExtension();
            $path='Admin/images/';
            $imagePath= $request->file('image')->move($path,$filName);

            $kosor->image=$path.$filName;
        }

        if($kosor->save()){
            session()->flash("success","تم الاضافه بنجاح ");
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kosor=Kosor::find($id);
        $images=Kosor::find($id)->GetImages;
        $menHalls=Kosor::find($id)->MenHalls;
        $womenHalls=Kosor::find($id)->WomenHalls;
        return view('Admin.kosor.details',['kosor'=>$kosor,'images'=>$images,'menHalls'=>$menHalls,'womenHalls'=>$womenHalls]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kosor=Kosor::find($id);
        $district=District::all();
        $admin=Admin::all()->where('role','customer');
        return view('Admin.kosor.edit',['kosor'=>$kosor,'district'=>$district,'admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'num_hall' => 'required|string|max:255',
            'num_people' => 'required|string|max:255',
            'location' => 'required|string',
            'description' => 'required|string',
            'service_description' => 'required|string',
            'districtId' => 'required',
            'adminId' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);
        $kosor =Kosor::find($id);
        $kosor->name= $request->name;
        $kosor->district_id= $request->districtId;
        $kosor->admin_id= $request->adminId;
        $kosor->price= $request->price;
        $kosor->num_hall= $request->num_hall;
        $kosor->num_people= $request->num_people;
        $kosor->location= $request->location;
        $kosor->description= $request->description;
        $kosor->service_description= $request->service_description;
        if($request->image!=null)
        {
            $filName=time().".".$request->image->getClientOriginalExtension();
            $path='Admin/images/';
            $imagePath= $request->file('image')->move($path,$filName);

            $kosor->image=$path.$filName;
        }
        if($kosor->save()){
            session()->flash("success","تم التعديل  بنجاح ");
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kosor = Kosor::find($id);
        $kosor->delete();
        return back();
    }
}
