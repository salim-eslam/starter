<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

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



Route::get('/redirect/{service}','SocialControler@redirect');
Route::get('/callback/{service}','SocialControler@callback');

Route::get('/fillable','RouteControler@get_offer');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
        Route::group(['prefix'=>'offers'],function () {

            /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/create','RouteControler@set_offer');
        Route::post('/store','RouteControler@store_offer')->name("store");// name function is used to give aname to route
        Route::get('/add','RouteControler@add_offer');
        Route::get('/all','RouteControler@get_offer');


        });


    Route::get('/fillable','RouteControler@get_offer');



});
