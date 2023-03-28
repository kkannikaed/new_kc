<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//การสร้าง route หมายถึงการสร้าง path link
//class = function webController
// /path link
// name path -> function

Route::get('/', [WebController::class, 'home'])->name('home');

Route::get('/welcome', [WebController::class, 'welcome'])->name('welcome');

Route::post('/welcome', [WebController::class, 'welcome'])->name('welcome');

Route::get('/testbody', [WebController::class, 'body'])->name('body');

Route::get('/testoperate', [WebController::class, 'operate'])->name('operate');

Route::get('/testtheory', [WebController::class, 'theory'])->name('theory');

Route::get('/list_option', [WebController::class, 'option'])->name('option');

Route::get('/savename', [WebController::class, 'saveName'])->name('savename');

Route::post('/savename', [WebController::class, 'saveName'])->name('savename');

Route::post('/save-test-body', [WebController::class, 'saveTestBody'])->name('save-test-body');

Route::post('/save-test-theory', [WebController::class, 'saveTestTheory'])->name('save-test-theory');

Route::post('/save-test-operate', [WebController::class, 'saveTestOperate'])->name('save-test-operate');

Route::get('/deletebody/{id}', [WebController::class, 'deleteBody'])->name('deletebody');

Route::get('/deletetheory/{id}', [WebController::class, 'deleteTheory'])->name('deletetheory');

Route::get('/deleteoperate/{id}', [WebController::class, 'deleteOperate'])->name('deleteoperate');

Route::get('/deleteuser/{id}', [WebController::class, 'deleteUser'])->name('deleteuser');

Route::post('/update-edit-body', [WebController::class, 'updateEditBody'])->name('update-edit-body');

Route::post('/update-edit-theory', [WebController::class, 'updateEditTheory'])->name('update-edit-theory');

Route::post('/update-edit-operate', [WebController::class, 'updateEditOperate'])->name('update-edit-operate');
