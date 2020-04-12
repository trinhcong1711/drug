<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    public function staff(){
        return $this->belongsTo(Staff::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function medicines(){
        return $this->belongsToMany(Medicine::class);
    }
}
