<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Session;

class AdminController extends Controller {

    public function index() {
        // This method to load admin dashboard
        return view('admin::dashboard');
    }

    public function dispatchEmail() {
        $email = 'swapnil.gangurde@enyotalearning.com';
        //php artisan queue:table
        //php artisan migrate
        // .env QUEUE_DRIVER=database
        //php artisan make:job SendWelcomeEmail
        // code into handle method of  SendWelcomeEmail
        $this->dispatch(\App\Jobs\SendWelcomeEmail::fromRequest($email));
//        \App\Jobs\SendWelcomeEmail::dispatch($email);
    }

    public function changeLanguage(Request $request) {
        // Admin change language ajax call here
        $lang_code = $request->lang_code;
        $res = array('errorCode' => '0');
        if ($lang_code) {
            $get_lang_info = \App\Language::where('lang_code', $lang_code)->first();
            if (!empty($get_lang_info)) {
                Session::put('applocale', $get_lang_info->lang_code);
                $res = array('errorCode' => '1');
            }
        }
        print_r(json_encode($res));
    }

}
