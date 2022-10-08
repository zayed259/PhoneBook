<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth'])->group(function () {

    // tag
    Route::resource("/tag", TagController::class);

    // contact
    Route::get('contact/trashed', [ContactController::class, 'trashed']);
    Route::post('contact/trashed/{id}/restore', [ContactController::class, 'trashedRestore'])->name('contact.trashed.restore');
    Route::post('contact/trashed/{id}/force_delete', [ContactController::class, 'trashedDelete'])->name('contact.trashed.destroy');
    Route::resource("/contact", ContactController::class);
    Route::get('export_contact_pdf', [ContactController::class, 'export_contact_pdf']);
    Route::post('favorite', [ContactController::class, 'favorite']);
    Route::get('search', [ContactController::class, 'search']);
    


});

require __DIR__.'/auth.php';
