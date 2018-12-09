<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'cif', 'email',
    ];

    public function user(){
        return $this->hasMany('App/User');
    }

    public function department(){
        return $this->hasMany('App/Department');
    }
}
