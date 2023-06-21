<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ControllerPublisher;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|ch
*/



//edit profile
Route::get('/profile/edit',[Account::class, 'edit'] )->name('profile.edit');
Route::post('/profile/update', [Account::class, 'update'])->name('profile.update');


Route::get('/game/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/game/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/game:delete{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/game/edit{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/game/update{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/game/show{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/game/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/game/home', [ProductController::class, 'home'])->name('product.home');

Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'cart'])->name('pages.cart');
Route::post('/update-cart/{id}', [HomeController::class, 'update'])->name('update-cart');
Route::delete('/remove-from-cart/{id}', [HomeController::class, 'remove']);

//fogot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::post('/account/login', [Account::class, 'store'])->name('auth.register');
Route::get('/register', [Account::class, 'show'])->name('welcome.register');
Route::get('/', [Account::class, 'showLogin'])->name('welcome.login');
Route::get('/logout', [Account::class, 'logout'])->name('logout');
Route::post('/login', [Account::class, 'login'])->name('auth.login');

Route::get('/account/edit{id}', [Account::class, 'edit'])->name('welcome.update');
Route::post('/account/update{id}', [Account::class, 'update'])->name('auth.update');
Route::get('/account/index', [Account::class, 'showAccount'])->name('welcome.index');
Route::get('/account:delete{id}', [ControllerPublisher::class, 'destroy'])->name('welcome.destroy');


Route::get('/publisher/index', [ControllerPublisher::class, 'index'])->name('publisher.index');
Route::get('/publisher/create', [ControllerPublisher::class, 'create'])->name('publisher.create');
Route::get('/publisher:delete{id}', [ControllerPublisher::class, 'destroy'])->name('publisher.destroy');
Route::get('/publisher/edit{id}', [ControllerPublisher::class, 'edit'])->name('publisher.edit');
Route::post('/publisher/update{id}', [ControllerPublisher::class, 'update'])->name('publisher.update');
Route::get('/publisher/show{id}', [ControllerPublisher::class, 'show'])->name('publisher.show');
Route::post('/publisher/store', [ControllerPublisher::class, 'store'])->name('publisher.store');