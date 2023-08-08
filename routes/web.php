<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ControllerPublisher;
use App\Http\Controllers\CartProductController;



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

Route::get('/admin/home', [ProductController::class, 'admin'])->name('admin.home')->middleware('auth');

Route::get('/game/index', [ProductController::class, 'index'])->name('product.index')->middleware('auth');
Route::get('/game/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::get('/game:delete{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');
Route::get('/game/edit{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
Route::post('/game/update{id}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
Route::get('/game/show{id}', [ProductController::class, 'show'])->name('product.show')->middleware('auth');
Route::post('/game/store', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::get('/game/home', [ProductController::class, 'home'])->name('product.home');

Route::post('/account/login', [Account::class, 'store'])->name('auth.register');
Route::get('/register', [Account::class, 'show'])->name('welcome.register');
Route::get('/', [Account::class, 'showLogin'])->name('welcome.login');
Route::get('/logout', [Account::class, 'logout'])->name('logout');
Route::post('/login', [Account::class, 'login'])->name('auth.login');

Route::get('/account/edit{id}', [Account::class, 'edit'])->name('welcome.update')->middleware('auth');
Route::post('/account/update{id}', [Account::class, 'update'])->name('auth.update')->middleware('auth');
Route::get('/account/create', [Account::class, 'addAccount'])->name('auth.create')->middleware('auth');
Route::get('/account/index', [Account::class, 'showAccount'])->name('welcome.index')->middleware('auth');
Route::get('/account:delete{id}', [Account::class, 'destroy'])->name('welcome.destroy');


Route::get('/publisher/index', [ControllerPublisher::class, 'index'])->name('publisher.index')->middleware('auth');
Route::get('/publisher/create', [ControllerPublisher::class, 'create'])->name('publisher.create')->middleware('auth');
Route::get('/publisher:delete{id}', [ControllerPublisher::class, 'destroy'])->name('publisher.destroy')->middleware('auth');
Route::get('/publisher/edit{id}', [ControllerPublisher::class, 'edit'])->name('publisher.edit')->middleware('auth');
Route::post('/publisher/update{id}', [ControllerPublisher::class, 'update'])->name('publisher.update')->middleware('auth');
Route::get('/publisher/show{id}', [ControllerPublisher::class, 'show'])->name('publisher.show')->middleware('auth');
Route::post('/publisher/store', [ControllerPublisher::class, 'store'])->name('publisher.store')->middleware('auth');

Route::get('/profile/dashboard',[ProfileController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('update_profile')->middleware('auth');

Route::get('/profile/change-password', [ProfileController::class, 'change_password'])->name('change_password')->middleware('auth');
Route::post('/profile/update-password', [ProfileController::class, 'update_password'])->name('update_password')->middleware('auth');    

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show')->middleware('auth');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
Route::get('/category:delete{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('auth');

Route::get('cart', [CartProductController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('add-to-cart/{id}', [CartProductController::class, 'addToCart'])->name('add_to_cart')->middleware('auth');
Route::post('/cart/update', [CartProductController::class, 'updateCart'])->name('cart.update')->middleware('auth');
Route::delete('/cart/remove/{id}', [CartProductController::class, 'remove'])->name('cart.remove')->middleware('auth');
Route::get('/cart/confirm-delete/{id}', [CartProductController::class, 'confirmDelete'])->name('cart.confirmDelete')->middleware('auth');

Route::get('/game/detail{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('/search', [HomeController::class, 'search'])->name('pages.search');         
