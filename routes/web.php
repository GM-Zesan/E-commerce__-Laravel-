<?php

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

Route::get('/', 'frontend\HomeController@index');
Route::get('/Product_Details/{slug}', 'frontend\HomeController@quickView')->name('quick.View');
Route::get('/All_Products', 'frontend\HomeController@productList')->name('shop');

Route::post('/Find-Product', 'frontend\HomeController@productFind')->name('find.product');
Route::get('/Get-Product', 'frontend\HomeController@productGet')->name('get.product');



// CONTACT US
Route::prefix('Contact_Us')->group(function(){
    Route::get('', 'frontend\contactUsController@Contact')->name('contact.us');
});



// ABOUT US
Route::prefix('About_Us')->group(function(){
    Route::get('', 'frontend\aboutUsController@About')->name('about.us');
});



// SHOPPING CART
Route::prefix('Shopping_Cart')->group(function(){
    Route::get('Show_Cart', 'frontend\cartController@Cart')->name('cart');
    Route::post('Add_to_Cart', 'frontend\cartController@AddToCart')->name('insert.cart');
    Route::post('Update_Cart', 'frontend\cartController@UpdateCart')->name('update.cart');
    Route::get('Delete_Cart/{rowId}', 'frontend\cartController@DeleteCart')->name('delete.cart');
});


// USER ACCOUNT
Route::get('User_Login', 'frontend\CheckOutController@UserLogin')->name('user.login');
Route::get('User_Signup', 'frontend\CheckOutController@UserSignup')->name('user.signup');
Route::post('User_Signup_Store', 'frontend\CheckOutController@SignupStore')->name('signup.store');
Route::get('Email_Verify', 'frontend\CheckOutController@EmailVerify')->name('email.verify');
Route::post('Verify_Store', 'frontend\CheckOutController@VerifyStore')->name('verify.store');
Route::get('Checkout', 'frontend\CheckOutController@checkOut')->name('check.out');
Route::post('Checkout_Store', 'frontend\CheckOutController@checkoutStore')->name('checkout.store');



// BACKEND All Routes Are Here
Route::prefix('backend')->group(base_path('routes/backend.php'));

// BACKEND AUTHENTICATION
Auth::routes();

Route::group(['middleware'=>['auth','customer']],function(){
    Route::get('/My_Profile', 'frontend\DashboardController@dashboard')->name('dashboard');
    Route::get('/My_Profile_Edit', 'frontend\DashboardController@editProfile')->name('edit.profile');
    Route::post('/My_Profile_Update', 'frontend\DashboardController@updateProfile')->name('update.profile');
    Route::get('/Password_Change', 'frontend\DashboardController@passwordChange')->name('password.change');
    Route::post('/Password_Update', 'frontend\DashboardController@passwordUpdate')->name('password.update');
    Route::get('/Payment', 'frontend\DashboardController@payment')->name('customer.payment');
    Route::post('/Payment_Store', 'frontend\DashboardController@paymentStore')->name('payment.store');
    Route::post('/Payment_Cart_Update', 'frontend\DashboardController@cartUpdate')->name('cart.update.payment');
    Route::get('/Order_List', 'frontend\DashboardController@orderList')->name('order.list');
    Route::get('/Order_Details/{id}', 'frontend\DashboardController@orderDetails')->name('order.details');
    Route::get('/Order_Print/{id}', 'frontend\DashboardController@orderPrint')->name('order.print');
});



Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/backend', 'HomeController@index')->name('home');
});
