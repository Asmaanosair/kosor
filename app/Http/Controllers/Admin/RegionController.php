<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $regions=Region::all();
        return response()->json([$regions]);
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
            'name' => 'required|string|unique:regions|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);


            $region = new Region();
        if($request->image!=null)
        {
            $filName=time().".".$request->image->getClientOriginalExtension();
            $path='Admin/images/';
            $imagePath= $request->file('image')->move($path,$filName);

            $region->image=$path.$filName;
        }
            $region->name= $request->name;
            $region->save();
        return response()->json($region);
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
        $region=Region::find($id);
        return response()->json([$region]);
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
        ]);
        $region = Region::find($id);
        if($request->image!=null)
        {
            $filName=time().".".$request->image->getClientOriginalExtension();
            $imagePath= $request->file('image')->move('public/Admin/assets/images',$filName);
            $region->image=$imagePath;
        }
        $region->name = $request->name;
        $region->save();
        return response()->json(compact('region'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();
        return response()->json('The Regions successfully deleted');
    }
}
