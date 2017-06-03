<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexStudent(){
        $users = User::paginate(10);
        return view('liststudent', ['users' => $users]);
    }

    public function addIndex(){
        $guardians = User::where('role', '=', 'dosen')->orderBy('name', 'asc')->get();
        return view('form.register', ['guardians' => $guardians]);
    }

    public function create(Request $request){
        $rules = array(
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'retypepassword' => 'required',
            'role' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            Session::flash('fails', 'Gagal lewat validator');
            return redirect()->route('user.add.index')
                ->withErrors($validator);
        } else {
            if($request->retypepassword != $request->password){
                Session::flash('fail', 'Password tidak cocok');
                return redirect()->route('user.add.index');
            }
            $check_username = User::where('username', '=', $request->username)->first();
            if($check_username) {
                Session::flash('fail', 'Username sudah terdaftar');
                return redirect()->route('user.add.index');
            } else {
                $user = new User();
                $user->username = $request->username;
                $user->name = $request->name;
                $user->password = bcrypt($request->password);
                if($request->role != null){
                    $user->role = $request->role;
                } else {
                    $user->role = 'dosen';
                }
                if($request->guardian_id != null){
                    $user->guardian_id = $request->guardian_id;
                }
                if($user->save()){
                    return redirect()->route('index');
                } else {
                    return redirect()->route('user.add.index');
                }
            }
        }
    }

    public function delete($id){
        $user = User::find($id);
        if($user->role == 'dosen'){
            $user->delete();
            return redirect()->route('index.dosen');
        } elseif ($user->role == 'mahasiswa'){
            $user->delete();
            return redirect()->route('index.mahasiswa');
        }
    }

    public function showProfile($username){
        $user = User::where('username', '=', $username)->first();
        return view('profile', ['user' => $user]);
    }

    public function showEditForm($username){
        $user = User::with('parent')->where('username', '=', $username)->first();
        $guardians = User::where('role', '=', 'dosen')->get();
        return view('form.updateuser', ['user' => $user, 'guardians' => $guardians]);
    }

    public function update(Request $request){
        $fields = array('username', 'name', 'password', 'role', 'guardian_id');
        $user = User::where('username', '=', $request->username)->first();
        forEach($fields as $field) {
            if ($request[$field]) {
                if ($field === 'password') {
                    // exceptional for password
                    $user[$field] = bcrypt($request[$field]);
                } else  {
                    $user[$field] = $request[$field];
                }
            }
        }
        $user->save();
        return redirect()->route('user.edit.form', ['username' => $user['username']]);
    }
}
