<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kosor extends Model
{
    public function Review()
    {
        return $this->hasMany(Review::class);
    }
    public function Booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function District()
    {
        return $this->belongsTo(District::class);
    }
    public function GetImages()
    {
        return $this->hasMany(KosorImage::class);
    }
    public function MenHalls()
    {
        return $this->hasMany(MenHall::class);
    }
    public function WomenHalls()
    {
        return $this->hasMany(WomenHall::class);
    }
    public function getImageAttribute($value)
    {
        return url($value);
    }


}
