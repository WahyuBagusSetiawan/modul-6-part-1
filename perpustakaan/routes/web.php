<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('index', [
        "title" => "Beranda"
    ]);
});

Route::get('/about', function () {
    return view('About', [
        "title" => "About",
        "nama" => "Wahyu Bagus Setiawan",
        "email" => "wahyubgs12305@gmail.com",
        "gambar" => "Wahyu Bagus Setiawan.jpg"
    ]);
});

Route::get('/gallery', function () {
    return view('Gallery', [
        "title" => "Gallery"
    ]);
});

// Route::get('/contacts', function () {
//     return view('contacts', [
//         "title" => "contacts"
//     ]);
// });
Route::resource('/contacts', ContactController::class);
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
