<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\User;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Mail;

class UserController extends Controller {
    /*
     * @funcation name  : index
     * function details : list of User Details
     * @Param           : null
     * @return          : null
     */

    public function index() {
        return view('admin::user.list');
    }

    /*
     * @funcation name  : getUserData
     * function details : get Users data
     * @Param           : null
     * @return          : User data with datatable
     */

    public function getUserData() {
        $all_user = User::all();
        return Datatables::of($all_user)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            return '<a class="btn btn-sm btn-primary" href="' . url('/user/edit/' . base64_encode($row->id)) . '">Edit</a> ' .
                                    '<button class="btn btn-sm btn-primary remove"  onClick="deleteUser(' . $row->id . ');">Delete</button>';
                        })
                        ->editColumn('user_status', function ($row) {
                            if ($row->user_status == '0') {
                                return "Inactive";
                            } else if ($row->user_status == '1') {
                                return "Active";
                            } else if ($row->user_status == '2') {
                                return "Blocked";
                            } else {
                                return "Inactive";
                            }
                        })
                        ->rawColumns(['user_status', 'action'])
                        ->removeColumn('created_at')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    /*
     * @funcation name  : editUser
     * function details : edit user detail single record
     * @Param           : user_id - base64_encoded
     * @return          : result_array - user_info
     */

    public function editUser(Request $request) {
        $input = $request->all();
        $user_id = $request->user_id;
        $user_id = base64_decode($user_id);
        $user_info = User::find($user_id);

        if (empty($user_info)) {
            return redirect('/')->with('error', \Config::get('constants.USER_RECORD_NOT_FOUND'));
        }
        return view('admin::user.edit', compact('user_info'));
    }

    /*
     * @funcation name  : editUserPost
     * function details : update User Detail single record
     * @Param           : user_id - base64_encoded, first_name, last_name
     * @return          : redirect to User List page
     */

    public function editUserPost(Request $request) {
        $input = $request->all();
        $user_id = $request->user_id;
        $user_id = base64_decode($user_id);

        $messages = [
            'first_name.required' => 'First Name field is required.',
            'last_name.required' => 'Last Name field is required.',
            'email.required' => 'Email field is required.',
        ];

        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                        ], $messages);
        if ($validator->fails()) {
            return redirect('/user/edit/' . base64_encode($user_id))
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user_data = User::find($user_id);
            if (empty($user_data)) {
                return redirect('/')->with('error', 'Record not found.');
            } else {
                $user_data->first_name = $input['first_name'];
                $user_data->last_name = $input['last_name'];
                $user_data->email = $input['email'];
                $user_data->user_type = $input['user_type'];
                $user_data->user_status = $input['user_status'];
                $query = $user_data->save();

                return redirect('/user')->with('success', \Config::get('constants.USER_RECORD_UPDATED'));
            }
        }
    }

    /*
     * @funcation name  : addUser
     * function details : Add User Detail single rectord
     * @Param           : null
     * @return          : User add form
     */

    public function addUser() {
        return view('admin::user.add');
    }

    /*
     * @funcation name  : addUserPost
     * function details : add User Detail single record
     * @Param           : first_name, last_name, email
     * @return          : redirect to User List page
     */

    public function addUserPost(Request $request) {
        $input = $request->all();

        $messages = [
            'first_name.required' => 'First Name field is required.',
            'last_name.required' => 'Last Name field is required.',
            'email.required' => 'Email field is required.',
        ];

        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                        ], $messages);
        if ($validator->fails()) {
            return redirect('/user/add/')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $add_user_data = new User;
            $add_user_data->insert([
                'password' => bcrypt($input['first_name']),
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'user_type' => $input['user_type'],
                'user_status' => $input['user_status'],
                'email' => $input['email'],
            ]);
            $data['email'] = $input['email'];
            $data['password'] = bcrypt($input['first_name']);
            /*
             * START - Trigger Mail to added new user
             */
            if ($input['email']) {
                Mail::to($input['email'], $data)->send(new \App\Mail\AddNewUser($data));
            }
            /*
             * END - Trigger Mail to added new user
             */
            return redirect('/user')->with('success', \Config::get('constants.USER_RECORD_ADDED'));
        }
    }

    /*
     * @funcation name  : deleteUser
     * function details : delete User single record
     * @Param           : user_id - base64_encoded
     * @return          : redirect to User List page
     */

    public function deleteUser(Request $request) {
        $user_id = $request->user_id;
        $obj_user = User::find($user_id);
        $query = $obj_user->delete();
        print_r(json_encode(array('errorCode' => '0')));
    }

    /*
     * @funcation name  : checkEmailExist
     * function details : check email already exists or not
     * @Param           : email, user_id optional
     * @return          : true or false
     */

    public function checkEmailExist(Request $request) {
        $user_id = $request->user_id;
        if ($user_id) {
            $email = User::where('email', Input::get('email'))->where('id', '!=', $user_id)->first();
        } else {
            $email = User::where('email', Input::get('email'))->first();
        }
        if (!empty($email)) {
            return 'false';
        } else {
            return 'true';
        }
    }

}
