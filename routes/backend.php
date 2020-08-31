<?php


// backend All Routes Are Here

// Route::get('/', function () {
//     return view('backend.home');
// });

//category crud are here
Route::prefix('Category')->group(function(){
    Route::get('Add', 'backend\catController@addCategory')->name('category.add');
    Route::post('Data', 'backend\catController@storeCategory')->name('category.data');
    Route::get('List', 'backend\catController@listCategory')->name('category.list');
    Route::get('View/{id}', 'backend\catController@viewCategory')->name('category.view');
    Route::get('Edit/{id}', 'backend\catController@editCategory')->name('category.edit');
    Route::post('Update/{id}','backend\catController@updateCategory')->name('category.update');
    Route::get('Delete/{id}', 'backend\catController@deleteCategory')->name('category.delete');
});


//post crud are here
Route::prefix('Post')->group(function(){
    Route::get('Add', 'backend\postController@add')->name('post.add');
    Route::post('Data', 'backend\postController@store')->name('post.data');
    Route::get('List', 'backend\postController@list')->name('post.list');
    Route::get('View/{id}', 'backend\postController@view')->name('post.view');
    Route::get('Edit/{id}', 'backend\postController@edit')->name('post.edit');
    Route::post('Update/{id}', 'backend\postController@update')->name('post.update');
    Route::get('Delete/{id}', 'backend\postController@delete')->name('post.delete');
});


//brand crud are here
Route::prefix('Brand')->group(function(){
    Route::get('Add', 'backend\brandController@add')->name('brand.add');
    Route::post('Data', 'backend\brandController@store')->name('brand.data');
    Route::get('List', 'backend\brandController@list')->name('brand.list');
    Route::get('View/{id}', 'backend\brandController@view')->name('brand.view');
    Route::get('Edit/{id}', 'backend\brandController@edit')->name('brand.edit');
    Route::post('Update/{id}', 'backend\brandController@update')->name('brand.update');
    Route::get('Delete/{id}', 'backend\brandController@delete')->name('brand.delete');
});

//color crud are here
Route::prefix('Color')->group(function(){
    Route::get('Add', 'backend\colorController@add')->name('color.add');
    Route::post('Data', 'backend\colorController@store')->name('color.data');
    Route::get('List', 'backend\colorController@list')->name('color.list');
    Route::get('View/{id}', 'backend\colorController@view')->name('color.view');
    Route::get('Edit/{id}', 'backend\colorController@edit')->name('color.edit');
    Route::post('Update/{id}', 'backend\colorController@update')->name('color.update');
    Route::get('Delete/{id}', 'backend\colorController@delete')->name('color.delete');
});

//Size crud are here
Route::prefix('Size')->group(function(){
    Route::get('Add', 'backend\sizeController@add')->name('size.add');
    Route::post('Data', 'backend\sizeController@store')->name('size.data');
    Route::get('List', 'backend\sizeController@list')->name('size.list');
    Route::get('View/{id}', 'backend\sizeController@view')->name('size.view');
    Route::get('Edit/{id}', 'backend\sizeController@edit')->name('size.edit');
    Route::post('Update/{id}', 'backend\sizeController@update')->name('size.update');
    Route::get('Delete/{id}', 'backend\sizeController@delete')->name('size.delete');
});

//Product crud are here
Route::prefix('Product')->group(function(){
    Route::get('Add', 'backend\productController@add')->name('product.add');
    Route::post('Data', 'backend\productController@store')->name('product.data');
    Route::get('List', 'backend\productController@list')->name('product.list');
    Route::get('View/{id}', 'backend\productController@view')->name('product.view');
    Route::get('Edit/{id}', 'backend\productController@edit')->name('product.edit');
    Route::post('Update/{id}', 'backend\productController@update')->name('product.update');
    Route::get('Delete/{id}', 'backend\productController@delete')->name('product.delete');
});

//Sliders crud are here
Route::prefix('Slider')->group(function(){
    Route::get('Add', 'backend\sliderController@add')->name('slider.add');
    Route::post('Data', 'backend\sliderController@store')->name('slider.data');
    Route::get('List', 'backend\sliderController@list')->name('slider.list');
    Route::get('Edit/{id}', 'backend\sliderController@edit')->name('slider.edit');
    Route::post('Update/{id}', 'backend\sliderController@update')->name('slider.update');
    Route::get('Delete/{id}', 'backend\sliderController@delete')->name('slider.delete');
});

//Customers crud are here
Route::prefix('customer')->group(function(){
    Route::get('Draft', 'backend\customerController@draft')->name('customer.draft');
    Route::get('List', 'backend\customerController@list')->name('customer.list');
    Route::get('Delete/{id}', 'backend\customerController@delete')->name('customer.delete');
});

//Sliders crud are here
Route::prefix('Order')->group(function(){
    Route::get('Pending', 'backend\orderController@pendingOrder')->name('pending.order');
    Route::get('Approved', 'backend\orderController@approvedOrder')->name('approved.order');
    Route::get('Order_Details/{id}', 'backend\orderController@detailsOrder')->name('details.order');
    Route::post('Approve', 'backend\orderController@appOrder')->name('app.order');
});