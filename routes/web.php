<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
        Route::get('/user/contacts', [UserController::class, 'contacts'])->name('user.contacts');


        Route::get('/user/contacts/add', function () {
            return view('user.add-contact');
        })->name('user.contacts.add');

        Route::post('/user/contacts/add', [UserController::class, 'addContact'])->name('user.contacts.add');

        Route::delete('/user/contacts/remove/{id}', [UserController::class, 'removeContact'])->name('user.contacts.remove');
    });
});

Route::get('/debug-routes', function () {
    return [
        'user.contacts.add' => route('user.contacts.add'),
    ];
});

Route::get('/test', function () {
    return 'This should not be displayed if middleware works';
})->middleware('test');
