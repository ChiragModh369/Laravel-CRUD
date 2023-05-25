<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/hello/{id}/{name?}', function ($id, $name = null) {

    $data = compact('id', 'name');

    return view('hello')->with($data);
});
Route::get('/view', function () {
    $data = Customer::all();
    echo "<pre>";
    print_r($data->toArray());
    echo "</pre>";
});




Route::group(['middleware' => 'RedirectIfAuthenticated'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'insert'])->name('register');


});
Route::get('Home', [UserController::class, 'index'])->middleware('authcheck');



Route::get('/', function () {
    return view('welcome');
});


Route::post('/insert', [UserController::class, 'register']);

Route::get('/edit/{id}', [UserController::class, 'edit']);
Route::post('/update/{id}', [UserController::class, 'update']);

Route::get('/delete/{id}', [UserController::class, 'delete']);

Route::post('/login', [UserController::class, 'auth'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');