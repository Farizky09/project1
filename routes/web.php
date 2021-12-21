<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pengguna;
use App\Models\Telepon;

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

Route::get('/pengguna' , 'PenggunaController@index');
Route::get('/article', 'WebController@index');
Route::get('/anggota', 'DikiController@index');