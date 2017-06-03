<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['code'];

    public function subject(){
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }

    public function lecturer(){
        return $this->belongsTo('App\User', 'lecturer_id', 'id');
    }

    public function participants(){
        return $this->hasMany('App\Participant', 'room_id', 'id');
    }
}
