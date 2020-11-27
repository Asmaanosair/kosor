<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    public function Kosor()
//    {
//        return $this->hasMany(Kosor::class);
//    }
//    public function User()
//    {
//        return $this->hasMany(User::class);
//    }
    protected $primaryKey='id';
    protected $fillable=[
      'id','user_id','kosor_id'
    ];


}
