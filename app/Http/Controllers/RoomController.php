<?php

namespace App\Http\Controllers;
use App\Room;
use App\User;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function addIndex(){
        $subjects = Subject::get();
        $lecturers = User::where('role', '=', 'dosen')->orderBy('name', 'asc')->get();
        return view('form.addroom', ['subjects' => $subjects, 'lecturers' => $lecturers]);
    }

    public function create(Request $request){
        $rules = array(
            'code' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            Session::flas('fail', 'Gagal lewat validator');
            return redirect()->route('room.add.index');
        } else {
            $room = new Room();
            $room->code = $request->code;
            $room->subject_id = $request->subject_id;
            $room->lecturer_id = $request->lecturer_id;
            if($room->save()){
                Session::flash('success', 'Kelas berhasil ditambahkan');
                return redirect()->route('index.room');
            } else {
                Session::flash('fail', 'Gagal menambahkan kelas');
                return redirect()->route('room.add.index');
            }
        }
    }
}
