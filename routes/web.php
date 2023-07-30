<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/qq', function () {
    return view('welcome');
});
Route::resource('/contacts', ContactController::class)->except('destroy','update',"index");
Route::get('/', [ContactController::class, 'index'])->name("contacts.index");

Route::post('/contacts/delete', [ContactController::class, 'destroy'])->name("contacts.destroy");
Route::post('/contacts/update', [ContactController::class, 'update'])->name("contacts.update");

Route::post('/search', [ContactController::class, 'search'])->name("ajax_search_contact");