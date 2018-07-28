<?php

Route::group(array('module' => 'Admin', 'namespace' => 'App\EnlModules\admin\Controllers', 'middleware' => ['web', 'auth', 'checkLanguage'], 'as' => 'admin::'), function() {

    Route::get('/home', 'AdminController@index');
    Route::get('/dispatchEmail', 'AdminController@dispatchEmail');
    Route::post('/change-language', 'AdminController@changeLanguage');

    /*
     * CMS pages route start here
     */
    Route::get('/cms', 'CmsController@index');
    Route::get('/get-all-cms', 'CmsController@getCmsData');
    Route::get('/cms/edit/{cms_id}', 'CmsController@editCms');
    Route::post('/cms/edit/{cms_id}', 'CmsController@editCmsPost');
    /*
     * CMS pages route end here
     */

    /*

     * Contact Us Routes Start
     */
    Route::get('/contact-us', 'ContactUsController@index');
    Route::get('/get-all-contact-us', 'ContactUsController@getContactUsData');
    Route::get('/contact-us/reply/{contact_us_id}', 'ContactUsController@replyToContact');
    Route::post('/contact-us/reply/{contact_us_id}', 'ContactUsController@replyPost');
    /*
     * Contact Us Routes End
     */

    /*
     * Global Setting route start here
     */
    Route::get('/global-setting/', 'GlobalSettingController@index');
    Route::get('/get-all-global-setting', 'GlobalSettingController@getGlobalSettingData');
    Route::get('/global-setting/edit/{global_setting_id}', 'GlobalSettingController@editGlobalSetting');
    Route::post('/global-setting/edit/{global_setting_id}', 'GlobalSettingController@editGlobalSettingPost');
    /*
     * Global Setting route end here
     */

    /*
     * User Management route start here
     */
    Route::get('/user/', 'UserController@index');
    Route::get('/get-all-user', 'UserController@getUserData');
    Route::get('/user/edit/{user_id}', 'UserController@editUser');
    Route::post('/user/edit/{user_id}', 'UserController@editUserPost');
    Route::get('/user/add', 'UserController@addUser');
    Route::post('/user/add', 'UserController@addUserPost');
    Route::post('/user/delete/{user_id}', 'UserController@deleteUser');
    Route::post('/user/check-email-exist', 'UserController@checkEmailExist');
    /*
     * User Management route end here
     */

    /*
     * Slider Banner route start here
     */
    Route::get('/slider', 'SliderController@index');
    Route::get('/get-all-slider', 'SliderController@getsliderData');
    Route::get('/slider/add', 'SliderController@addSlider');
    Route::post('/slider/add', 'SliderController@addSliderPost');
    Route::get('/slider/edit/{slider_id}', 'SliderController@editSlider');
    Route::post('/slider/edit/{slider_id}', 'SliderController@editSliderPost');
    Route::post('/slider/delete/{slider_id}', 'SliderController@deleteSlider');
    /*
     * Slider Banner route end here
     */

    Route::get('/error-404', function () {
        return view('error-404');
    });
});
