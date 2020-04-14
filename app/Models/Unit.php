<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function medicines(){
        return $this->hasMany(Medicine::class);
    }
}
