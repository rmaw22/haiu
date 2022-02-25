<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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

Route::get('/main_first', [HomeController::class, 'index'])
    ->name('index');

Route::get('/sign-in', function () {
    return view('auth.signin', ['name' => 'James']);
});
Route::get('/main', function () {
    return view('index_main', ['site_name' => 'HaiU']);
});
Route::get('/', [HomeController::class, 'main_temp'])
    ->name('main.index');
Route::get('viral', [HomeController::class, 'viral'])
    ->name('viral');

Route::get('random', [HomeController::class, 'random'])
    ->name('random');

Route::get('search', [HomeController::class, 'search'])
    ->name('search');
Route::get('nav/autocomplete', [HomeController::class, 'searchAuto'])
    ->name('searchAuto');

Route::get('view/{id}/{slug}', [HomeController::class, 'show'])
    ->name('show');
Route::get('view2/{id}/{slug}', [HomeController::class, 'show2'])->name('show2');


Route::group(['middleware' => ['auth']], function () {

    Route::post('write', [HomeController::class, 'store'])
        ->name('store');

    Route::post('save_like', [HomeController::class, 'save_like'])
        ->name('save_like');
    
    Route::post('save_like_comment', [HomeController::class, 'save_like_comment'])
        ->name('save_like_comment');
        
    Route::post('save_favorite', [HomeController::class, 'save_favorite'])
        ->name('save_favorite');

    Route::get('post/delete/{id}', [HomeController::class, 'delete_user_post'])
        ->name('delete_user_post');
        
    Route::get('comment/delete/{id}', [HomeController::class, 'delete_comment_post'])
        ->name('delete_comment_post');
        
    // report
    Route::get('report/{id}', [HomeController::class, 'report'])
        ->name('report');
});
Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Haiu',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('rizkymilanalpasya@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});

require __DIR__ . '/points.php';
require __DIR__ . '/comments.php';
require __DIR__ . '/categories.php';
require __DIR__ . '/pages.php';
require __DIR__ . '/tags.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
