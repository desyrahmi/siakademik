<?php

namespace App\Http\Controllers;
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

class SubjectController extends Controller
{
    public function addIndex(){
        return view('form.addsubject');
    }

    public function create(Request $request){
        $rules = array(
            'code' => 'required',
            'name' => 'required',
            'credit' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            Session::flash('fails', 'Gagal lewat validator');
            return redirect()->route('subject.add.index')
                ->withErrors($validator);
        } else {
            $check_subject_code = Subject::where('code', '=', $request->code)->first();
            if($check_subject_code){
                Session::flash('fails', 'Mata Kuliah telah terdaftar');
                return redirect()->route('subject.add.index');
            } else {
                $subject = new Subject();
                $subject->code = $request->code;
                $subject->name = $request->name;
                $subject->credit = $request->credit;
                if($subject->save()){
                    Session::flash('success', 'Mata Kuliah berhasil ditambahkan');
                    return redirect()->route('index.subject');
                }
            }
        }
    }
}
