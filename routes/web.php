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

// client
Route::group(['namespace' => 'client'], function() {
    Route::get('/', 'HomeController@index');

    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('product');
        Route::get('detail/{id}', 'ProductController@show')->name('product.detail');
        Route::get('filter_by_category/{category_id}', 'ProductController@filterByCategory')->name('product.by.category');
        Route::get('filter_by_value/{value_id}', 'ProductController@filterByValue')->name('product.by.value');
        // Search
        Route::get('filter', 'SearchController@getKey')->name('search.product');
    });

    // Construction
    Route::group(['prefix' => 'construction'], function () {
        Route::get('/', 'ConstructionController@index')->name('construction');
        Route::get('detail/{id}', 'ConstructionController@show')->name('construction.detail');
    });

    // Cost
    Route::get('cost', 'CostController@index')->name('cost');

    // News
    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')->name('news');
        Route::get('detail/{id}', 'NewsController@show')->name('news.detail');
    });

    // Project
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'ProjectController@index')->name('project');
        Route::get('detail/{id}', 'ProjectController@show')->name('project.detail');
    });

    // Contact
    Route::get('contact', 'HomeController@contact')->name('contact');

    // Search
    Route::get('search', 'SearchController@getKey')->name('search');
});

//admin
Route::group(['namespace' => 'admin'], function() {
    Route::get('login','LoginController@GetLogin')->middleware('CheckLogin');
    Route::post('login','LoginController@PostLogin');

    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogout'], function() {
        Route::get('dashboard', 'DashboardController@dashboard')->middleware('CheckRole');
        Route::get('logout', 'LoginController@Logout');

        // User
        Route::group(['prefix' => 'user', 'excluded_middleware' => 'CheckRole'], function() {
            Route::get('/', 'UserController@index');
            Route::get('add', 'UserController@new');
            Route::post('add', 'UserController@create');
            Route::get('edit/{id}', 'UserController@edit');
            Route::post('edit/{id}', 'UserController@update');
            Route::get('delete/{id}', 'UserController@destroy');
            Route::group(['prefix' => 'profile'], function() {
                Route::get('{id}', 'UserController@profile');
                Route::post('{id}', 'UserController@updateProfile');
                Route::get('{id}/password/edit', 'UserController@editPassword')->name('edit-password');
                Route::post('{id}/password/edit', 'UserController@updatePassword');
            });
        });

        // Category
        Route::group(['prefix' => 'category'], function() {
            Route::get('/', 'CategoryController@index');
            Route::post('/', 'CategoryController@create');
            Route::get('edit/{id}', 'CategoryController@edit');
            Route::post('edit/{id}', 'CategoryController@update');
            Route::get('delete/{id}', 'CategoryController@destroy');
        });

        // Product
        Route::group(['prefix' => 'product'], function() {
            Route::get('/', 'ProductController@index');
            Route::get('add', 'ProductController@new');
            Route::post('add', 'ProductController@create');
            Route::get('edit/{id}', 'ProductController@edit');
            Route::post('edit/{id}', 'ProductController@update');
            Route::get('delete/{id}', 'ProductController@destroy');

            // Attribute
            Route::group(['prefix' => 'attribute'], function() {
                Route::get('/', 'AttributeController@index');
                Route::post('add', 'AttributeController@create');
                Route::get('edit/{id}', 'AttributeController@edit');
                Route::post('edit/{id}', 'AttributeController@update');
                Route::get('delete/{id}', 'AttributeController@destroy');
            });

            // Value
            Route::group(['prefix' => 'value'], function() {
                Route::post('add', 'ValueController@create');
                Route::get('edit/{id}', 'ValueController@edit');
                Route::post('edit/{id}', 'ValueController@update');
                Route::get('delete/{id}', 'ValueController@destroy');
            });

            // Variant
            Route::group(['prefix' => 'variant'], function() {
                Route::get('add/{product_id}','VariantController@new');
                Route::post('add/{product_id}','VariantController@create');
                Route::get('edit/{product_id}','VariantController@edit');
                Route::post('edit/{product_id}','VariantController@update');
            });
        });

        // News
        Route::group(['prefix' => 'news'], function() {
            Route::get('/', 'NewsController@index');
            Route::get('add', 'NewsController@new');
            Route::post('add', 'NewsController@create');
            Route::get('edit/{id}', 'NewsController@edit');
            Route::post('edit/{id}', 'NewsController@update');
            Route::get('delete/{id}','NewsController@destroy');
        });

        // Project
        Route::group(['prefix' => 'project'], function() {
            Route::get('/', 'ProjectController@index');
            Route::get('add', 'ProjectController@new');
            Route::post('add', 'ProjectController@create');
            Route::get('edit/{id}', 'ProjectController@edit');
            Route::post('edit/{id}', 'ProjectController@update');
            Route::get('delete/{id}','ProjectController@destroy');
        });

        // Construction
        Route::group(['prefix' => 'construction'], function () {
            Route::get('/', 'ConstructionController@index');
            Route::get('add', 'ConstructionController@new');
            Route::post('add', 'ConstructionController@create');
            Route::get('edit/{id}', 'ConstructionController@edit');
            Route::post('edit/{id}', 'ConstructionController@update');
            Route::get('delete/{id}','ConstructionController@destroy');
        });

        // Cost
        Route::group(['prefix' => 'cost'], function () {
            Route::get('/', 'CostController@index');
            Route::get('add', 'CostController@new');
            Route::post('add', 'CostController@create');
            Route::get('edit/{id}', 'CostController@edit');
            Route::post('edit/{id}', 'CostController@update');
            Route::get('delete/{id}','CostController@destroy');
        });

        // Order
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'OrderController@index');
            Route::get('show/{id}', 'OrderController@show');
            Route::get('add', 'OrderController@new');
            Route::post('add', 'OrderController@create');
            Route::get('edit/{id}', 'OrderController@edit');
            Route::post('edit/{id}', 'OrderController@update');
            Route::get('delete/{id}', 'OrderController@destroy');
        });
    });
});