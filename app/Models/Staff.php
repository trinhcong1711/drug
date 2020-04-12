<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //

    public function card(){
        return $this->hasOne(Card::class);
    }

    public function salary(){
        return $this->hasOne(Salary::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
