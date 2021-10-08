<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::middleware("auth")->group(function(){
    //creation of task route
    Route::view("/taskform","createTask")->name("taskform");
    Route::post("/create/task",[TaskController::class,"create"]);
    //show taskList on dashboard
    Route::get("/dashboard",[TaskController::class,"index"])->name('dashboard');
    //deletion of task
    Route::get("/delete/task/{task}",[TaskController::class,"destroy"]);
});



Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
