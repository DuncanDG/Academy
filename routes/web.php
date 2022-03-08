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

// Route::get('/', function () {
//     return view('welcome')->name('welcome');
// });

//welcome link
Route::get('/', 'PagesController@index')->name('welcome');
//Auth links 
Auth::routes(['register' => true]);
// // Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// // Email Verification Routes...
// $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// $this->get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// $this->get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::group(['middleware' => 'auth'],function () {
    //homepage
   Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

   //Profile link 
   Route::get('profile', 'ProfileController@edit')->name('profile.edit');
   Route::match(['put', 'patch'], 'profile', 'ProfileController@update')->name('profile.update');
   Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

   //User link 
   Route::resource('users', 'UserController');
//    Route::get('user', 'UserController@index')->name('user.index');
//    Route::get('user', 'UserController@create')->name('user.create');

   //Product link
   Route::resource('products', 'ProductController');
   Route::get('/products/pdf', 'ProductController@printPdf')->name('products.printPdf'); 

   //Category link 
   Route::resource('categories', 'CategoriesController');  
   Route::get('/categories/pdf', 'CategoriesController@printPdf')->name('categories.printpdf');
   
    //clients link
  Route::resource('clients','ClientsController');
  Route::get('clients/{id }','ClientsController@restore')->name('clients.restore');

   //suppliers link 
   Route::resource('suppliers','SuppliersController');
});

 