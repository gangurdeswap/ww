<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class WelcomController extends Controller {

    public function index() {
        $slider_data = \App\Slider::all();
        return view('welcome', compact('slider_data'));
    }

    public function CmsPage(Request $request) {
        $all_segmment = \Request::segments();
        if (count($all_segmment) > 0) {
            $last_segment = end($all_segmment);
            $cms_details = \App\CmsPage::where('page_name', strtolower($last_segment))->first();
            return view('cms_page', compact('cms_details'));
        } else {
            return redirect('/');
        }
    }

    public function changeLanguage(Request $request) {
        $lang_code = $request->lang_code;
        $res = array('errorCode' => '0');
        if ($lang_code) {
            $get_lang_info = \App\Language::where('lang_code', $lang_code)->first();
            if (!empty($get_lang_info)) {
                Session::put('userlocale', $get_lang_info->lang_code);
                Session::put('userLangName', $get_lang_info->lang_title);
                $res = array('errorCode' => '1');
            }
        }
        print_r(json_encode($res));
    }

}
