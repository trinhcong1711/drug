<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function branches(){
        return $this->belongsToMany(Customer::class);
    }
}
