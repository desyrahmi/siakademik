<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;
use Session;
use Hash;

class AuthController extends Controller
{
    public function index(){
        return view('form.login');
    }

    public function doLogin(Request $requests){
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($requests->all(), $rules);
        if($validator->fails()){
            Session::flash('fail', 'Gagal lewat validator');
            return redirect()->route('login');
        } else {
            $userdata = array(
                'username' => $requests->username,
                'password' => $requests->password
            );
            if(Auth::attempt(array('username' => $userdata['username'], 'password' => $userdata['password']), true)){
                Session::flash('success', 'Sukses login');
                return redirect()->route('index');
            } else {
                Session::flash('fail', 'Gagal Login');
                return redirect()->route('login')
                    ->withErrors(['Username atau Password salah'])
                    ->withInput(Input::except('password'));
            }
        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
