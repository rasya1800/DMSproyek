<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('fe.login');
});

//Login Layout
Route::get('login', 'App\Http\Controllers\Controller@login', ['except' => ['create', 'edit']]);
Route::post('/login/dlogin', 'App\Http\Controllers\Controller@dlogin', ['except' => ['create', 'edit']]);

//middleware auth user
Route::group(['middleware' => ['auth.user']], function () {
Route::get('logout', 'App\Http\Controllers\Controller@logout');
Route::get('/user/{email}', 'App\Http\Controllers\Controller@dashboardUsr', ['except' => ['create', 'edit']]);
Route::get('/user/repository/{email}/{pid}', 'App\Http\Controllers\Controller@repository', ['except' => ['create', 'edit']]);
//umain layout
});

//middleware auth admin
Route::group(['middleware' => ['auth.admin']], function () {

    Route::get('logout', 'App\Http\Controllers\Controller@logout');
    Route::get('/user/{email}', 'App\Http\Controllers\Controller@dashboardUsr', ['except' => ['create', 'edit']]);
Route::get('/user/repository/{email}/{pid}', 'App\Http\Controllers\Controller@repository', ['except' => ['create', 'edit']]);


//Admin Layout
Route::get('/admin', 'App\Http\Controllers\Controller@dashboardAdm', ['except' => ['create', 'edit']]);

//Data Admin
Route::get('/admin/dadmin', 'App\Http\Controllers\Controller@tampiladmin', ['except' => ['create', 'edit']]);
/*Tambah Admin*/
Route::get('/admin/dadmin/addadmin', 'App\Http\Controllers\Controller@addadmin', ['except' => ['create', 'edit']]);
Route::post('/admin/dadmin/kraddadmin', 'App\Http\Controllers\Controller@kraddadmin', ['except' => ['create', 'edit']]);
/*hapus admin*/
Route::get('/admin/dadmin/{email}', 'App\Http\Controllers\Controller@hapusadmin', ['except' => ['create', 'edit']]);
/*edit user admin*/
Route::get('edit/{id}', 'App\Http\Controllers\Controller@edit', ['except' => ['create', 'edit']]);
Route::post('update/{id}', 'App\Http\Controllers\Controller@update', ['except' => ['create', 'edit']]);


//Data User
Route::get('/admin/duser', 'App\Http\Controllers\Controller@tampiluser', ['except' => ['create', 'edit']]);
/*tambah user*/
Route::get('/admin/duser/adduser', 'App\Http\Controllers\Controller@adduser', ['except' => ['create', 'edit']]);
Route::post('/admin/duser/kradduser', 'App\Http\Controllers\Controller@kradduser', ['except' => ['create', 'edit']]);
/*hapus user*/
Route::get('/admin/duser/{email}', 'App\Http\Controllers\Controller@hapususer', ['except' => ['create', 'edit']]);


//umain layout
Route::get('/user/{email}', 'App\Http\Controllers\Controller@dashboardUsr', ['except' => ['create', 'edit']]);
Route::get('/user/repository/{email}/{pid}', 'App\Http\Controllers\Controller@repository', ['except' => ['create', 'edit']]);

//treeview plant
Route::get('plant-tree-view',['uses'=>'App\Http\Controllers\PlantController@managePlant']);
Route::post('add-plant',['as'=>'add.plant','uses'=>'App\Http\Controllers\PlantController@addPlant']);

//upload file
Route::get('/upload', 'App\Http\Controllers\UploadController@upload', ['except' => ['create', 'edit']]);
Route::post('/upload/proses', 'App\Http\Controllers\UploadController@proses_upload', ['except' => ['create', 'edit']]);
Route::get('/upload/hapus/{id}', 'App\Http\Controllers\UploadController@hapus', ['except' => ['create', 'edit']]);
Route::get('/upload/download/{id}/{file}', 'App\Http\Controllers\UploadController@download', ['except' => ['create', 'edit']]);

Route::get('/kirimemail','App\Http\Controllers\Controller@kiremail', ['except' => ['create', 'edit']]);

});

