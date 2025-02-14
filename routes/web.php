<?php

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
    return view('welcome');
});

Route::get('/', function () {
    return view('hello_world');
});

Route::get('/foo', function () {
    return 'Hello, world!';
});

Route::get('/foo/{id}', function ($id) {
    return 'User = ' . $id;
});

Route::get('/user', [UserController::class, 'index']);

Route::redirect('/coba', '/sini');

Route::get('/profile', function () {
    return view('profile', [
        'nama'  => 'Rafli Ulya Armadhan',
        'nim'   => 'E41231493',
        'prodi' => 'Teknik Informatika'
    ]);
});

Route::get('/user/{name?}', function ($name = 'Guest') {
    return "Hello, $name!";
});

Route::get('/user/name/{name}', function ($name) {
    return "Hello, $name!";
})->where('name', '[A-Za-z]+');

Route::get('/user/id/{id}', function ($id) {
    return "User ID: $id";
})->where('id', '[0-9]+');

Route::get('/user/details/{id}/{name}', function ($id, $name) {
    return "User ID: $id, Name: $name";
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

Route::get('/search/{query}', function ($query) {
    return "Search result for: $query";
})->where('query', '.*');

Route::get('/user/profile', [UserController::class, 'show'])->name('profile.user');

Route::get('/user5/profile', function () {
    return "Ini adalah halaman user 5.";
})->name('profile.user5');

Route::get('/user6/profile', [UserController::class, 'show'])->name('profile.user6');