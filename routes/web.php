<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/employees', function () {
    return view('employees');
})->name('employees');

//Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
//Route::post('/contact/submit', ContactController::class)->name('contact-form');

Route::get('/contact/all', [
    ContactController::class, 
    'allData'])
    ->name('contact-data');

Route::post('/contact/submit', [
    ContactController::class, 
    'submit']
    )->name('contact-form');

Route::get('/contact/all/{id}', [
    ContactController::class, 
    'showOneMessage']
    )->name('contact-data-one');
    
Route::get('/contact/all/{id}/update', [
    ContactController::class, 
    'updateMessage']
    )->name('contact-update');

Route::post('/contact/all/{id}/update', [
    ContactController::class, 
    'updateMessageSubmit']
    )->name('contact-update-submit');

Route::get('/contact/all/{id}/delete', [
    ContactController::class, 
    'deleteMessage']
    )->name('contact-delete');

