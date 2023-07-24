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

Route::get('/admin/home', [ProductController::class, 'admin'])->name('admin.home');

Route::get('/game/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/game/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/game:delete{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/game/edit{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/game/update{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/game/show{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/game/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/game/home', [ProductController::class, 'home'])->name('product.home');

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

Route::get('/profile/dashboard',[ProfileController::class, 'dashboard'])->name('dashboard');
Route::get('/profile/edit', [ProfileController::class, 'edit_profile'])->name('edit_profile');
Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('update_profile');

Route::get('/profile/change-password', [ProfileController::class, 'change_password'])->name('change_password');
Route::post('/profile/update-password', [ProfileController::class, 'update_password'])->name('update_password');    

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category:delete{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('cart', [CartProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [CartProductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartProductController::class, 'remove'])->name('remove_from_cart'); 

Route::get('/game/detail{id}', [HomeController::class, 'show'])->name('home.show');
Route::get('/search', [HomeController::class, 'search'])->name('pages.search');
