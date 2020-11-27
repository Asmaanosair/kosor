<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function City()
    {
        return $this->hasMany(City::class);
    }

//    public function getImageAttribute($value){
//        $image = url('/').'/'.$value;
//        return $image;
//    }

    public function getImageAttribute($value)
    {
        return url($value);
    }

    public function getAyHagaAttribute(){
        return 'Ay Haga';
    }


}
