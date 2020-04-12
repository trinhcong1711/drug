<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function medicines(){
        return $this->hasMany(Medicine::class);
    }
    public function child(){
        return $this->hasMany($this,'parent_id','id');
    }
}
