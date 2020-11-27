<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kosor;
use App\MenHall;
use Illuminate\Http\Request;

class MenHallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(AdminGuard()->user()->role=='admin') {
            $kosor = Kosor::all();
            $halls = MenHall::all();
        }else{
            $id=AdminGuard()->user()->id;
            $kosor=Kosor::where('admin_id',$id)->first();
            $halls=Kosor::find($kosor->id)->MenHalls;
        }


        return view('Admin.menHalls.showAll',['kosor'=>$kosor,'halls'=>$halls]);
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
            'kosorId' => 'required',
        ]);
        $kosor = new MenHall();
        $kosor->name= $request->name;
        $kosor->kosor_id= $request->kosorId;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'kosorId' => 'required',
        ]);
        $kosor =MenHall::find($id);
        $kosor->name= $request->name;
        $kosor->kosor_id= $request->kosorId;
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
        $hall = MenHall::find($id);
        $hall->delete();
        return back();


    }
}
