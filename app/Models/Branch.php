<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function staff(){
        return $this->hasMany(Staff::class);
    }
    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
}
