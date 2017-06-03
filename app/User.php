<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'username', 'name', 'password', 'role'
    ];

    public function parent(){
        return $this->belongsTo('App\User', 'guardian_id', 'id');
    }

    public function childrens(){
        return $this->hasMany('App\User', 'guardian_id', 'id');
    }

    public function rooms(){
        return $this->hasMany('App\Room', 'lecturer_id', 'id');
    }

    public function participants(){
        return$this->hasMany('App\Participant', 'student_id', 'id');
    }
}
