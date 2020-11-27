<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\District;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class
DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts= DB::table('districts')
            ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->select('districts.*', 'cities.city')
            ->get();
        $cities=City::all();
        return response()->json(compact('cities','districts'));

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
            'cityId' => 'required',
        ]);
        $district = new District();
        $district->name= $request->name;
        $district->city_id= $request->cityId;
        $district->save();
        return response()->json($district);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district=District::find($id);
        return response()->json([$district]);
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
        $district =District::find($id);
        $district->name= $request->name;
        $district->city_id= $request->cityId;
        $district->save();
        return response()->json($district);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();
        return response()->json('The district successfully deleted');
    }
}
