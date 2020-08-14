<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['logout' => false, 'register' => false]);

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    });

    Route::get('slide', 'SlideController@index')->name('slide.list');
    Route::get('slide/create', 'SlideController@create')->name('slide.add');
    Route::post('slide/store', 'SlideController@store')->name('slide.store');
    Route::get('slide/delete/{id}', 'SlideController@destroy')->name('slide.delete');

    Route::get('service_category', 'Service_CategoryController@index')->name('service_category.list');
    Route::get('service_category/create', 'Service_CategoryController@create')->name('service_category.create');
    Route::post('service_category/store', 'Service_CategoryController@store')->name('service_category.store');
    Route::get('service_category/edit/{id}', 'Service_CategoryController@edit')->name('service_category.edit');
    Route::post('service_category/update/{id}', 'Service_CategoryController@update')->name('service_category.update');
    Route::get('service_category/delete/{id}', 'Service_CategoryController@destroy')->name('service_category.delete');

    Route::get('service', 'ServiceController@index')->name('service.list');
    Route::get('service/create', 'ServiceController@create')->name('service.create');
    Route::post('service/store', 'ServiceController@store')->name('service.store');
    Route::get('service/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::get('service/delete/{id}', 'ServiceController@destroy')->name('service.delete');

    Route::get('testimonial', 'TestimonialController@index')->name('testimonial.list');
    Route::get('testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::post('testimonial/store', 'TestimonialController@store')->name('testimonial.store');
    Route::get('testimonial/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
    Route::post('testimonial/update/{id}', 'TestimonialController@update')->name('testimonial.update');
    Route::get('testimonial/delete/{id}', 'TestimonialController@destroy')->name('testimonial.delete');
});
