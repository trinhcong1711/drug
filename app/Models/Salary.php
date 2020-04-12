<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
