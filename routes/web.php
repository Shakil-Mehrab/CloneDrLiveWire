<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MagicLinkController;

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



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
    Route::post('send', [MagicLinkController::class, 'send'])->name('magic-link.send');
    Route::get('{token}/authenticate', [MagicLinkController::class, 'authenticate'])->name('magic-link.authenticate');

    Route::post('login', [MagicLinkController::class, 'login'])->name('magic-link.login');
    Route::post('register', [MagicLinkController::class, 'register'])->name('magic-link.register');
    Route::get('check', [MagicLinkController::class, 'check'])->name('magic-link.check');
    Route::get('incorrect', [MagicLinkController::class, 'incorrect'])->name('magic-link.incorrect');
    // Route::get('{token}', [MagicLinkController::class, 'oldAuthenticate'])->name('magic-link.authenticate');
    Route::get('{token}/invite', [MagicLinkController::class, 'inviteAuthenticate'])->name('magic-link.authenticate.invite');
});

require __DIR__ . '/auth.php';