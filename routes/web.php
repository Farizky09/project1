<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Models\Pengguna;
use App\Models\Telepon;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;


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

Route::get('/' , function(){
    return redirect('login');
});
Route::get('/pengguna' , 'PenggunaController@index');
Route::get('/article', 'WebController@index');
Route::get('/anggota', 'DikiController@index');
Route::get('/article/show', 'WebController@show');
// Route::get('/post','PostController@index');
// Route::post('/post/insert/',[PostController::class,'insert'])->name('insertPost');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'::class])->group(function () {
    Route::resource('post', PostController::class); 
});
