<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KosorImage;
use Illuminate\Http\Request;

class KosorImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            'images' => 'required',
        ]);
        if(!empty($request->file('images'))) {
            $files = [];
            foreach ($request->file('images') as $media) {
                if (!empty($media)) {
                    $filName=time().$media->getClientOriginalName();
                    $path='Admin/images/';
                    $imagePath= $media->move($path,$filName);
                    $files[] = $path.$filName;

                }
            }
            foreach ($files as $key => $row) {
                $image = new KosorImage();
                $image->image = $row;
                $image->kosor_id = $request->id;
                $image->save();
            }
                session()->flash("success", "تم الاضافه بنجاح");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = KosorImage::find($id);
        $image->delete();
        return back();
    }
}
