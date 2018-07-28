<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
use Yajra\DataTables\DataTables;
use AdminConstant;
use Mail;

class ContactUsController extends Controller {

    public function index() {
//        $contact_us = new ContactUs;
//        $contact_us->email = 'swapnil.gangurde@enyotalearning.com';
//        $contact_us->message = 'tetx message';
//        $contact_us->save();
        // This method to load contact us list page
        return view('admin::contact-us.list');
    }

    public function getContactUsData() {
        // This method to get all contact us data using datatable
        $all_contact_us = ContactUs::all();
        return Datatables::of($all_contact_us)
                        ->addIndexColumn()
                        ->addColumn('date', function($row) {
                            return date('Y-m-d H:i:s', strtotime($row->created_at));
                        })
                        ->addColumn('action', function ($row) {
                            if (empty($row->replies)) {
                                return '<a class="btn btn-sm btn-primary" href="' . url('/contact-us/reply/' . base64_encode($row->id)) . '">Reply</a>';
                            } else {
                                return '<a class="btn btn-sm btn-warning" href="' . url('/contact-us/reply/' . base64_encode($row->id)) . '">Replied</a>';
                            }
                        })
                        ->removeColumn('created_at')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    public function replyToContact(Request $request) {
        // This method to load view of reply
        $contact_us_id = $request->contact_us_id;
        $contact_us_id = base64_decode($contact_us_id);
        $contact_details = ContactUs::find($contact_us_id);
        if (empty($contact_details)) {
            return redirect('contact-us')->with('error', AdminConstant::getC('CONTACT_US_NOT_FOUND'));
        }
        return view('admin::contact-us.reply', compact('contact_details'));
    }

    public function replyPost(Request $request) {
        // This method to save
        $contact_us_id = $request->contact_us_id;
        $contact_us_id = base64_decode($contact_us_id);
        $contact_details = ContactUs::find($contact_us_id);
        if (empty($contact_details)) {
            return redirect('contact-us')->with('error', AdminConstant::getC('CONTACT_US_NOT_FOUND'));
        }
        $input = $request->all();
        $reply = \App\ContactUsReply::updateOrCreate(
                        // First array is condition and second is value to be updated or inserted
                        ['contact_us_id' => $contact_us_id], ['contact_us_id' => $contact_us_id, 'reply_text' => $input['reply_text']]
        );
        /*
         * Email To contacted user
         */
        $email_data = array();
        $email_data['reply_text'] = $input['reply_text'];
        $email = Mail::to($contact_details->email, $email_data)->send(new \App\Mail\ContactUsReply($email_data));

        /*
         * Email To contacted user
         */
        return redirect('/contact-us')->with('success', AdminConstant::getC('CONTACT_US_REPLIED_SUCCESS'));
    }

}
