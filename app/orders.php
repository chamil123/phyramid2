<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class orders extends Model
{
      public function User(){
        return $this->belongsTo(User::class);
    }

    public function orderCols(){
        return $this->belongstoMany(product::class);
    }
    public static function createOrder(){
         return $user=Auth::user(); 
     
    }
}
