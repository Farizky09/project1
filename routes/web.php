<?php
use App\Http\Controllers\PostController;
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


Route::middleware(['auth'::class])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/post',[PostController::class,'index'])->name('data-index');
    Route::get('post/insert',[PostController::class,'create'])->name('insert');
    Route::get('post/delete/{id}',[PostController::class,'destroy'])->name('delete');
    Route::post('post/data/insert',[PostController::class,'store'])->name('store');
    Route::put('post/{post}/update',[PostController::class,'update'])->name('update');
    
});

//     Route::resource('post', PostController::class);
     
// Route::get('/list', 'PostController@Postlist');