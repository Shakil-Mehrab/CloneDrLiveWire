<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColabController;
use App\Http\Controllers\ConnectorController;
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

Route::middleware(['auth', 'verified'])->prefix('colabs')->group(function () {
    Route::get('/', [ColabController::class, 'index'])->name('colabs');
    Route::get('/{colab}', [ColabController::class, 'show'])->name('colabs.show');
    Route::get('/{colab}/accept', [ColabController::class, 'accept'])->name('colabs.accept');
    //TODO: unused
    Route::post('/', [ColabController::class, 'store'])->name('colabs.store');
    //TODO: unused
    Route::put('{colab}', [ColabController::class, 'update'])->name('colab.update');
    Route::delete('{colab}', [ColabController::class, 'destroy'])->name('colab.destroy');

    Route::post('/{colab}/card/add', [ColabController::class, 'addCard'])->name('colab.card.add');
    // Route::post('/{colab}/card/remove', [ColabController::class, 'removeCard'])->name('colab.card.remove');
});

Route::get('/dashboard', function () {
    //TODO: redirect after adding a connector
    return redirect('/connectors');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('connectors')->group(function () {
    Route::get('/', [ConnectorController::class, 'index'])->name('connector');
    Route::post('/', [ConnectorController::class, 'install'])->name('connector.install');
    //TODO: unused
    Route::put('{connector}', [ConnectorController::class, 'update'])->name('connector.update');
    //TODO: unused
    Route::delete('{connector}', [ConnectorController::class, 'destroy'])->name('connector.destroy');
});


require __DIR__ . '/auth.php';
