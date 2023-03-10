<?php
namespace App\Http\Controllers;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//การสร้าง route หมายถึงการสร้าง path link

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/welcome', [WebController::class, 'welcome'])->name('welcome');

Route::get('/testdrive', [WebController::class, 'drive'])->name('drive');

Route::get('/testbody', [WebController::class, 'body'])->name('body');

Route::get('/testoperate', [WebController::class, 'operate'])->name('operate');

Route::get('/testtheory', [WebController::class, 'theory'])->name('theory');

Route::get('/list_option', [WebController::class, 'option'])->name('option');

Route::get('/savename', [WebController::class, 'saveName'])->name('savename');

Route::post('/savename', [WebController::class, 'saveName'])->name('savename');

Route::post('/save-test-body', [WebController::class, 'saveTestBody'])->name('save-test-body');

Route::post('/save-test-theory', [WebController::class, 'saveTestTheory'])->name('save-test-theory');

Route::post('/save-test-operate', [WebController::class, 'saveTestOperate'])->name('save-test-operate');
