<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Room;
use App\User;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;
use Session;
use Hash;

class MainController extends Controller
{
    public function index(){
        $participants = Participant::with('student')->with('room')->where('student_id', '=', Auth::user()->id)->paginate(5);
        $classes = Room::with('lecturer')->with('subject')->where('lecturer_id', '=', Auth::user()->id)->paginate(5);
        $guards = User::with('parent')->where('guardian_id', '=', Auth::user()->id)->paginate(5);
//        return dd($guards);
        return view('index', ['participants' => $participants, 'classes' =>$classes, 'guards' => $guards]);
    }

    public function indexDosen(){
        $lecturers = User::where('role','=', 'dosen')->orderBy('username', 'asc')->paginate(5);
        return view('listdosen', ['lecturers' => $lecturers]);
    }

    public function indexWali($id){
        $lecturer = User::find($id);
        $students = User::with('parent')->where('guardian_id', '=', $id)->orderBy('username', 'asc')->paginate(10);
        return view('listwali', ['lecturer' => $lecturer, 'students' => $students]);
    }

    public function indexMahasiswa(){
        $students = User::with('parent')->where('role', '=', 'mahasiswa')->orderBy('username', 'asc')->paginate(5);
        return view('listmahasiswa', ['students' => $students]);
    }

    public function indexSubject(){
        $subjects = Subject::paginate(5);
        return view('listsubject', ['subjects' => $subjects]);
    }

    public function indexRoom(){
        $rooms = Room::with('subject')->with('lecturer')->paginate(5);
        return view('listroom', ['rooms' => $rooms]);
    }

    public function indexParticipant($id){
        $participants = Participant::with('room')->with('student')->where('room_id', '=', $id)->paginate(5);
        $room= Room::with('subject')->with('lecturer')->where('id', '=', $id)->first();
        return view('listparticipant', ['participants' => $participants, 'roomname' => $room]);
    }

    public function detailWali($id){
        $participants = Participant::with('student')->with('room')->where('student_id', '=', $id)->paginate(5);
        $classes = Room::with('lecturer')->with('subject')->where('lecturer_id', '=', $id)->paginate(5);
        $user = User::find($id);
        return view('detail', ['user' => $user, 'participants' => $participants, 'classes' => $classes]);
    }
}
