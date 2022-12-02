<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\ShopComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index',HomeComponent::class);

Route::get('shop',ShopComponent::class);

Route::get('cart',CartComponent::class);

Route::get('checkout',CheckoutComponent::class);

Route::get('login',LoginComponent::class)->name('login');

Route::post('login',[UserController::class,"postLogin"])->name('postLogin');

Route::get('logout',[UserController::class,"logout"]);

Route::get('register',RegisterComponent::class)->name('register');

Route::post('register',[UserController::class,"postRegister"])->name('postRegister');