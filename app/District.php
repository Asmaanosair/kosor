<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function City()
    {
        return $this->belongsTo(City::class);
    }
    public function Kosor()
    {
        return $this->hasMany(Kosor::class);
    }

}
