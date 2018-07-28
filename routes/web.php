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
Route::middleware(['checkUserLanguage'])->group(function () {
    Route::get('/', 'WelcomController@index');
    Route::get('/admin', 'Auth\LoginController@index')->name('login');
    Route::get('/login', 'Auth\LoginController@index')->name('login');
    Route::post('/post-login', 'Auth\LoginController@loginUser');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/change-language-front', 'WelcomController@changeLanguage');

    /*
     * CMS Pages
     */
    Route::get('/about-us', 'WelcomController@CmsPage');
    Route::get('/term-and-condition', 'WelcomController@CmsPage');
    Route::get('/privacy-policy', 'WelcomController@CmsPage');
    /*
     * CMS Pages
     */

    /*
     * Contact Us
     */
    Route::get('/contact', 'ContactController@index');
    Route::post('/send-contact', 'ContactController@sendContact');
    /*
     * Contact Us
     */
});
