<?php

Route::group(['namespace' => 'duncanrmorris\assets\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){
        
        Route::get('assets', 'AssetsController@index')->name('assets');
        Route::put('assets/new', 'AssetsController@store')->name('assets.add');
        Route::get('assets/edit/{id}', 'AssetsController@edit')->name('assets.edit');
        Route::put('assets/update/{id}', 'AssetsController@update')->name('assets.update');
        Route::get('assets/view/{id}', 'AssetsController@show')->name('assets.view');
        Route::put('assets/del/{id}', 'AssetsController@destroy')->name('assets.del');
        Route::get('assets/search/{search}','AssetsController@search')->name('assets.search');
        

    ### CONTROLS ###
    Route::get('assets/controls/{id}', 'AssetscontrolsController@index')->name('assets.controls');
    Route::get('assets/controls/view/{id}', 'AssetscontrolsController@show')->name('assets.controls.view');
    Route::get('assets/controls/setup/{id}', 'AssetscontrolsController@create')->name('assets.controls.setup');
    Route::get('assets/controls/edit/{id}', 'AssetscontrolsController@edit')->name('assets.controls.edit');
    Route::put('assets/controls/update/{id}', 'AssetscontrolsController@update')->name('assets.controls.update');

    });

    Route::get('assets/onboard/{id}/{hostname}/{ip}/{os}/{make}/{vendor}','AssetsController@onboard')->name('assets.onboard');
    Route::put('assets/onbaord/action', 'AssetsController@onboard_action')->name('assets.onboard.action');
});