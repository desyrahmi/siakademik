<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function (){
    Route::get('/login', ['uses' => 'AuthController@index', 'as' => 'login']);
    Route::post('/login', ['uses' => 'AuthController@doLogin', 'as' => 'auth.doLogin']);
});


Route::group(['middleware' => ['auth']], function (){
    Route::get('/', ['uses' => 'MainController@index', 'as' => 'index']);
    Route::get('/logout', ['uses' => 'AuthController@doLogout', 'as' => 'logout']);
    Route::get('/add-user', ['uses' => 'UserController@addIndex', 'as' => 'user.add.index']);
    Route::post('/add-user', ['uses' => 'UserController@create', 'as' => 'user.register']);

    Route::get('/delete/{id}', ['uses' => 'UserController@delete', 'as' => 'user.delete']);
    Route::get('/delete/peserta/{id}', ['uses' => 'ParticipantController@delete', 'as' => 'participant.delete']);
    Route::get('/delete/kelas/{id}', ['uses' => 'RoomController@delete', 'as' => 'room.delete']);
    Route::get('/delete/mata-kuliah/{id}', ['uses' => 'SubjectController@delete', 'as' => 'subject.delete']);

    Route::get('/update/profile/{username}', ['uses' => 'UserController@showUpdateForm', 'as' => 'profile.edit.form']);
    Route::post('/update/profile/{username}', ['uses' => 'UserController@updateProfile', 'as' => 'profile.update']);
    Route::get('/update/user/{username}', ['uses' => 'UserController@showEditForm', 'as' => 'user.edit.form']);
    Route::post('/update/user/{username}', ['uses' => 'UserController@update', 'as' => 'user.update']);
//    Route::get('/update-user-password/{username}', ['uses' => 'UserController@showEditPassword', 'as' => 'user.edit.password']);
//    Route::post('/update-user-password/{username}', ['uses' => 'UserController@updatePassword', 'as' => 'password.update']);
    Route::get('/update/kelas/{id}', ['uses' => 'RoomController@showEditForm', 'as' => 'room.edit.form']);
    Route::post('/update/kelas/{id}', ['uses' => 'RoomController@update', 'as' => 'room.update']);
    Route::get('/update/mata-kuliah/{id}', ['uses' => 'SubjectController@showEditForm', 'as' => 'subject.edit.form']);
    Route::post('/update/mata-kuliah/{id}', ['uses' => 'SubjectController@update', 'as' => 'subject.update']);
    Route::get('/update/nilai/{id}', ['uses' => 'ParticipantController@showEditForm', 'as' => 'participant.edit.form']);
    Route::post('/update/nilai/{id}', ['uses' => 'ParticipantController@update', 'as' => 'participant.update']);

    Route::get('/list-dosen', ['uses' => 'MainController@indexDosen', 'as' => 'index.dosen']);
    Route::get('/list-mahasiswa', ['uses' => 'MainController@indexMahasiswa', 'as' => 'index.mahasiswa']);
    Route::get('/list-anak-wali/{id}', ['uses' => 'MainController@indexWali', 'as' => 'index.wali']);
    Route::get('/detail-anak-wali/{id}', ['uses' => 'MainController@detailWali', 'as' => 'detail.wali']);
    Route::get('/list-subject', ['uses' => 'MainController@indexSubject', 'as' => 'index.subject']);
    Route::get('/list-room', ['uses' => 'MainController@indexRoom', 'as' => 'index.room']);
    Route::get('/list-participant/{id}', ['uses' => 'MainController@indexParticipant', 'as' => 'index.participant']);

    Route::get('/add-room', ['uses' => 'RoomController@addIndex', 'as' => 'room.add.index']);
    Route::post('/add-room', ['uses' => 'RoomController@create', 'as' => 'room.register']);
    Route::get('/add-subject', ['uses' => 'SubjectController@addIndex', 'as' => 'subject.add.index']);
    Route::post('/add-subject', ['uses' => 'SubjectController@create', 'as' => 'subject.register']);
    Route::get('/add-participant', ['uses' => 'ParticipantController@addIndex', 'as' => 'participant.add.index']);
    Route::post('/add-participant', ['uses' => 'ParticipantController@create', 'as' => 'participant.register']);

});
