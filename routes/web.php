<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
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


Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);

Route::get('/signup',[SignupController::class,'index']);
Route::post('/signup',[SignupController::class,'signup']);

Route::get('/',[HomeController::class,'index']);

Route::post('/groupmess',[UserController::class,'create_group']);
Route::post('/getmessage',[UserController::class,'getMess']);
Route::post('/sendmessage',[UserController::class,'sendMessage']);



Route::get('/test',function(){
    return view('test');
});

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home1',function(){
//     return view('home1');
// });
