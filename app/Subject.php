<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['code', 'name', 'credit'];

    public function rooms(){
        return $this->hasMany('App\Room', 'subject_id', 'id');
    }
}
