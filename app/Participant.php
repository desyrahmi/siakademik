<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['mid_exam_result', 'final_exam_result'];

    public function room(){
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }

    public function student(){
        return $this->belongsTo('App\User', 'student_id', 'id');
    }
}
