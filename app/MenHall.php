<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenHall extends Model
{
    public function Kosor()
    {
        return $this->belongsTo(Kosor::class);
    }
}
