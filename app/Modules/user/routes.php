<?php

Route::group(array('module' => 'User', 'namespace' => 'App\EnlModules\user\Controllers', 'middleware' => ['web'], 'as' => 'user::'), function() {



    Route::get('/error-404', function () {
        return view('error-404');
    });
});


