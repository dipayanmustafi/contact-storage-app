<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Redirect the home URL to the contacts index page
Route::get('/', function () {
    return redirect()->route('contacts.index');
});

// Resource routes for contacts (handles create, read, update, delete)
Route::resource('contacts', ContactController::class);

// Route for bulk XML import via file upload
Route::post('contacts/import', [ContactController::class, 'import'])->name('contacts.import');
