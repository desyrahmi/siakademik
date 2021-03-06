<?php

namespace App\Http\Controllers;
use App\Participant;
use App\Room;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function addIndex(){
        $rooms = Room::with('subject')->get();
        return view('form.addparticipant', ['rooms' => $rooms]);
    }

    public function create(Request $request){
        $fields = array('mid_exam_result', 'final_exam_result');
        $student_id = Auth::user()->id;
        $participant = new Participant();
        $participant->room_id = $request->room_id;
        $participant->student_id = $student_id;
        forEach($fields as $field) {
            if ($request[$field]) {
                if ($field === 'mid_exam_result') {
                    $participant[$field] = $request[$field];
                } else if($field === 'final_exam_result') {
                    $participant[$field] = $request[$field];
                }
            }
        }
        if($participant->save()){
            Session::flash('success', 'Mata Kuliah ditambahkan');
            return redirect()->route('index');
        } else {
            Session::flash('fail', 'Gagal mengambil mata kuliah');
            return redirect()->route('participant.add.index');
        }
    }

    public function showEditForm($id){
        $participant = Participant::where('id', $id)->first();
        return view('form.updateparticipant', ['participant' => $participant]);
    }

    public function update(Request $request){
        $fields = array('mid_exam_result', 'final_exam_result');
        $participant = Participant::where('id', '=', $request->id)->first();
        forEach($fields as $field) {
            $participant[$field] = $request[$field];
        }
        $participant->save();
        return redirect()->route('participant.edit.form', ['id' => $participant['id']]);
    }

    public function delete($id){
        $participant = Participant::find($id);
        $participant->delete();
        return redirect()->route('index.participant', ['id' => $participant->room_id]);
    }
}
