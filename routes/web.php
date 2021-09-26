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
$data=5;
Route::get('/landing', function () {
    return view('landing');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/index','Front\UserController@getindex');

Route::get('/test1', function () {
    return 'welcome from test1';
})->name('a');
Route::get('/test2/{id}', function ($id) {
    return 'welcom  '. $id;
})->name('b');
Route::namespace('Front')->group(function (){

//    all routs in this group are avilable by controller or method in folder (front)
//    Route::get('users','UserController@ShowUserName');

});

Route::prefix('users')->group(function (){
    Route::get('show','Controller@ShowUserName');

});
Route::group(['prefix'=>'users'],function (){

//    set of routs
    Route::get('/',function (){
        return 'work';
    });


});
Route::get('/home',function (){
    return 'home';
});
//Route::group(['namespace'=>'Admin'],function (){
//   Route::get('second','SecondController@showstring');
//});
Route::get('second','Admin\SecondController@showstring');



Route::get('/login',function (){
    return 'you must be login to access tis bage';
})->name('login');
Route::resource('news','NewsController');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
