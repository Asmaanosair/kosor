<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function Kosor()
    {
        return $this->belongsTo(Kosor::class);
    }
}
