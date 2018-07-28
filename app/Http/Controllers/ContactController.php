<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Helpers\AdminConstant;

class ContactController extends Controller {

    public function index() {
        return view('contact');
    }

    public function sendContact(Request $request) {
        $input = $request->all();
        $messages = [
            'email.required' => 'Please enter first name.',
            'message.required' => 'Please enter first name.',
            'message.max' => 'Message should not be greater than 500 characters.',
        ];
        $rules = array(
            'email' => 'required|email',
            'message' => 'required|max:500'
        );
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/contact')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $session_insight_action_insert = new \App\ContactUs();
            $session_insight_action_insert->insert([
                'email' => encrypt($input['email']),
                'message' => encrypt($input['message']),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
        return redirect('/contact')->with('success', AdminConstant::getC('CONTACT_US_SUCCESS'));
    }

}
