<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

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

Route::get('/clear', function () {
    return Artisan::call('config:cache');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


//Route::get('/mk-user-create', function () {
//
//    return User::create([
//        'name' => "tsul_dotarant",
//        'username' => "tsul_dotarant",
//        'email' => "mk1@tsul.uz",
//        'password' => Hash::make("doc_tsul"),
//    ]);
//});

/*
Route::get('/mk-user-update/{id}', function ($id) {

    $user = User::find($id);
    $user->password = Hash::make("12300123");
    return $user->update();
});
*/

Route::group([
    'prefix' => 'mk',
    'namespace' => 'Mk',
    'middleware' => ['web', 'auth']
], function () {

    Route::get('/', 'MkController@index')->name('mk');
    Route::get('/clear', 'MkController@clear')->name('clear');
});

Route::group([
    'prefix' => 'user',
    'namespace' => 'Mk',
    'middleware' => ['web', 'auth']
], function () {

//    Route::resource('user', 'UserController');
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/deleteu/{id}', 'UserController@del')->name('user.del');
    Route::resource('user', 'UserController');

//    Route::get('/{id}', 'UserController@show')->name('user.show');
//    Route::get('/{id}', 'UserController@edit')->name('user.edit');
});


Route::group([
    'prefix' => 'x',
    'namespace' => 'X',
    'middleware' => ['web', 'auth']
], function () {
    Route::get('/', 'XController@index')->name('x');
    Route::get('/question/{id}', 'XController@question')->name('xquestion');
    Route::get('/questiondel/{id}', 'XController@xquestiondel')->name('xquestiondel');
    Route::get('/departmentdel/{id}', 'XController@xqdepartmentdel')->name('xqdepartmentdel');
    Route::post('/department/store', 'XController@depstore')->name('xdepstore');
    Route::post('/xexcelupload', 'XController@xexcelupload')->name('xexcelupload');



        Route::get('/main', 'XController@main')->name('mainquestions');
    Route::post('/mainupload', 'XController@mainupload')->name('mainupload');
    Route::get('/maindel/{id}', 'XController@maindel')->name('maindel');


//zsd105118
    // ehyy4725


});
