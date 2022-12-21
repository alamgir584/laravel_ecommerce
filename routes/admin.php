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

// Route::get('/check', function () {
//     return view('welcome');

// });

// Auth::routes();
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/admin/change-password', 'AdminController@changepassword')->name('admin.password.change');
    Route::post('/admin/change-update', 'AdminController@updatepassword')->name('admin.password.update');

    // Route::group(['prefix'=>'category'],function({
    //     Route::get('/', 'CategoryController@index')->name('category.index');
    // }));
    Route::prefix('category')->group(function () {
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/delete/{id}','CategoryController@delete')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit');
        Route::post('/update','CategoryController@update')->name('category.update');
    });

    Route::prefix('subcategory')->group(function () {
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
        Route::post('/store','SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}','subcategoryController@delete')->name('subcategory.delete');
        Route::get('/edit/{id}','subcategoryController@edit');
        Route::post('/update','subcategoryController@update')->name('subcategory.update');
    });
    Route::prefix('childcategory')->group(function () {
        Route::get('/','ChildcategoryController@index')->name('childcategory.index');
        Route::post('/store','ChildcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}','ChildcategoryController@delete')->name('childcategory.delete');
        Route::get('/edit/{id}','ChildcategoryController@edit');
        Route::post('/update','ChildcategoryController@update')->name('childcategory.update');
    });
    Route::prefix('brand')->group(function () {
        Route::get('/','BrandController@index')->name('brand.index');
        Route::post('/store','BrandController@store')->name('brand.store');
        Route::get('/delete/{id}','BrandController@delete')->name('brand.delete');
        Route::get('/edit/{id}','BrandController@edit');
        Route::post('/update','BrandController@update')->name('brand.update');
    });
    Route::prefix('setting')->group(function () {
        //seo setting
        Route::prefix('seo')->group(function () {
            Route::get('/','SettingController@seo')->name('seo.setting');
            Route::post('/update/{id}','SettingController@seoUpdate')->name('seo.setting.update');
        });
        //smtp setting
		Route::group(['prefix'=>'smtp'], function(){
			Route::get('/','SettingController@smtp')->name('smtp.setting');
			Route::post('/update/{id}','SettingController@smtpUpdate')->name('smtp.setting.update');
	    });
        //page setting
		Route::group(['prefix'=>'page'], function(){
			Route::get('/','PageController@index')->name('page.index');
            Route::get('/create','PageController@create')->name('create.page');
            Route::post('/store', 'PageController@store')->name('page.store');
            Route::get('/delete/{id}','PageController@destroy')->name('page.delete');
			Route::get('/edit/{id}','PageController@edit')->name('page.edit');
			Route::post('/update/{id}','PageController@update')->name('page.update');
	    });
        //website setting
		Route::group(['prefix'=>'website'], function(){
			Route::get('/','SettingController@website')->name('website.setting');
            Route::post('/update/{id}','SettingController@websiteupdate')->name('website.setting.update');
	    });
        //warehouse setting
		Route::group(['prefix'=>'warehouse'], function(){
			Route::get('/','WarehouseController@index')->name('warehouse.index');
			Route::get('/create','WarehouseController@create')->name('create.warehouse');
			Route::post('/store','WarehouseController@store')->name('store.warehouse');
            Route::get('/delete/{id}','WarehouseController@delete')->name('delete.warehouse');
            Route::get('/edit/{id}','WarehouseController@edit')->name('edit.warehouse');
            Route::post('/update/{id}','WarehouseController@update')->name('update.warehouse');
	    });

    });
            //Coupon Routes
            Route::group(['prefix'=>'coupon'], function(){
                Route::get('/','CouponController@index')->name('coupon.index');
                Route::get('/create','CouponController@create')->name('create.coupon');
                Route::post('/store','CouponController@store')->name('store.coupon');
                Route::get('/delete/{id}','CouponController@delete')->name('coupon.delete');
                Route::get('/edit/{id}','CouponController@edit')->name('edit.coupon');
                Route::post('/update/{id}','CouponController@update')->name('update.coupon');
            });
            //Coupon Routes
            Route::group(['prefix'=>'Pickup-point'], function(){
                Route::get('/','PickupController@index')->name('pickup-point.index');
                Route::get('/create','PickupController@create')->name('create.pickup-point');
                Route::post('/store','PickupController@store')->name('store.pickup-point');
                Route::get('/delete/{id}','PickupController@delete')->name('pickup-point.delete');
                Route::get('/edit/{id}','PickupController@edit')->name('edit.pickup-point');
                Route::post('/update/{id}','PickupController@update')->name('update.pickup-point');
            });

});
