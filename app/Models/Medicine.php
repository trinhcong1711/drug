<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function bills(){
    return $this->belongsToMany(Bill::class);
}
}
