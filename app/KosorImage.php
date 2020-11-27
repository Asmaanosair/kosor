<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KosorImage extends Model
{
    public function Kosor()
    {
        return $this->belongsTo(Kosor::class);
    }
    public function getImageAttribute($value)
    {
        return url($value);
    }
}
