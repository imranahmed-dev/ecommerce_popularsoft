<?php

use Illuminate\Support\Facades\Route;

//Clear Cache
Route::get('clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'Cache Cleared Successfully'; //Return anything
});

/////////////////////////Frontend routes////////////////////////////////
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/contact', 'FrontendController@contact')->name('contact');
    Route::get('/cart', 'FrontendController@cart')->name('cart');
    Route::get('user/login', 'FrontendController@userLogin')->name('user.login');
    Route::get('user/register', 'FrontendController@userRegister')->name('user.register');
    Route::post('user/store', 'FrontendController@userStore')->name('user.store');
    Route::get('/product/details/{slug}', 'FrontendController@productDetails')->name('product.details');

    //Shopping Cart
    Route::post('/cart/store', 'CartController@store')->name('cart.store');
    Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');

    //Order
    Route::post('/shipping/store', 'OrderController@shipping_store')->name('shipping.store');
    Route::get('/payment', 'OrderController@payment')->name('payment');
    Route::post('/order/store', 'OrderController@order_store')->name('order.store');
});

/*User dashboard*/
Route::group(['prefix'=>'/customer','namespace' => 'Frontend','middleware'=>['auth','user']], function(){
    
    //User profile
    Route::get('/dashboard','DashboardController@user_dashboard')->name('user.dashboard');
    Route::get('/profile','DashboardController@user_profile')->name('user.profile');
    Route::get('edit/profile','DashboardController@user_edit_profile')->name('user.edit.profile');
    Route::post('update/profile/{id}','DashboardController@user_update_profile')->name('user.update.profile');
    Route::get('/change/password','DashboardController@user_change_password')->name('user.change.password');
    Route::post('/update/password','DashboardController@user_update_password')->name('user.update.password');

    //Orders
    Route::get('/orders','DashboardController@orders')->name('user.orders');
    Route::get('/orders/details/{id}','DashboardController@order_details')->name('user.order.details');
    
    
});

//Auth route
Auth::routes();

/////////////////////////Backend routes////////////////////////////////
Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']], function(){

    Route::get('/dashboard','Backend\DashboardController@admin_dashboard')->name('home');

    //Admin
    Route::group(['as' => 'admin.', 'prefix' => '/admin', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'AdminController@index')->name('index');
        Route::get('/create', 'AdminController@create')->name('create');
        Route::post('/store', 'AdminController@store')->name('store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminController@update')->name('update');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('destroy');
    });

    //Admin Profile
    Route::group(['as' => 'admin.profile.', 'prefix' => '/admin/profile', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProfileController@index')->name('index');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::post('/update', 'ProfileController@update')->name('update');
        Route::get('/edit/password', 'ProfileController@editPassword')->name('ep');
        Route::post('/update/password', 'ProfileController@updatePassword')->name('up');
    });

    //Category
    Route::group(['as' => 'category.', 'prefix' => '/category', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
    });

    //Brand
    Route::group(['as' => 'brand.', 'prefix' => '/brand', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'BrandController@index')->name('index');
        Route::get('/create', 'BrandController@create')->name('create');
        Route::post('/store', 'BrandController@store')->name('store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('/update/{id}', 'BrandController@update')->name('update');
        Route::get('/destroy/{id}', 'BrandController@destroy')->name('destroy');
    });

    //Color
    Route::group(['as' => 'color.', 'prefix' => '/color', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ColorController@index')->name('index');
        Route::get('/create', 'ColorController@create')->name('create');
        Route::post('/store', 'ColorController@store')->name('store');
        Route::get('/edit/{id}', 'ColorController@edit')->name('edit');
        Route::post('/update/{id}', 'ColorController@update')->name('update');
        Route::get('/destroy/{id}', 'ColorController@destroy')->name('destroy');
    });

    //Size
    Route::group(['as' => 'size.', 'prefix' => '/size', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'SizeController@index')->name('index');
        Route::get('/create', 'SizeController@create')->name('create');
        Route::post('/store', 'SizeController@store')->name('store');
        Route::get('/edit/{id}', 'SizeController@edit')->name('edit');
        Route::post('/update/{id}', 'SizeController@update')->name('update');
        Route::get('/destroy/{id}', 'SizeController@destroy')->name('destroy');
    });

     //Product
     Route::group(['as' => 'product.', 'prefix' => '/product', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');
        Route::get('/destroy/{id}', 'ProductController@destroy')->name('destroy');

    });
    
    //Product
     Route::group(['as' => 'order.', 'prefix' => '/order', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('/update/{id}', 'OrderController@update')->name('update');
        Route::get('/destroy/{id}', 'OrderController@destroy')->name('destroy');

    });
});
