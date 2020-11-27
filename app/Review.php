<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id','rate','kosor_id'
    ];
    public function Kosor()
    {
        return $this->belongsTo(Kosor::class);
    }
}
