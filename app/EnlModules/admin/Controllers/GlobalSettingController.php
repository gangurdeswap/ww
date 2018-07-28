<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\GlobalSetting;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class GlobalSettingController extends Controller {
    /*
     * @funcation name  : index
     * function details : list of global settings
     * @Param           : null
     * @return          : null
     */

    public function index() {
        return view('admin::global_setting.list');
    }

    /*
     * @funcation name  : getGlobalSettingData
     * function details : get global settings data
     * @Param           : null
     * @return          : global setting data with datatable
     */

    public function getGlobalSettingData() {
        $all_global_setting = GlobalSetting::all()->take(10);
        return Datatables::of($all_global_setting)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            return '<a class="btn btn-sm btn-primary" href="' . url('/global-setting/edit/' . base64_encode($row->id)) . '">Edit</a>';
                        })
                        ->editColumn('value', function ($row) {
                            if ($row->id == '2') {
                                return '<img src="' . asset('/uploads/' . $row->value) . '" title="logo" alt="logo" width="70px" height="70px" />';
                            } else {
                                return $row->value;
                            }
                        })
                        ->rawColumns(['value', 'action'])
                        ->removeColumn('created_at')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    /*
     * @funcation name  : editGlobalSetting
     * function details : edit global setting single rectord
     * @Param           : global_setting_id - base64_encoded
     * @return          : result_array - global_setting_info
     */

    public function editGlobalSetting(Request $request) {
        $input = $request->all();
        $global_setting_id = $request->global_setting_id;
        $global_setting_id = base64_decode($global_setting_id);
        $global_setting_info = GlobalSetting::find($global_setting_id);

        if (empty($global_setting_info)) {
            return redirect('/')->with('error', \Config::get('constants.GLOBALSETTING_RECORD_NOT_FOUND'));
        }
        return view('admin::global_setting.edit', compact('global_setting_info'));
    }

    /*
     * @funcation name  : editGlobalSettingPost
     * function details : update global setting single rectord
     * @Param           : global_setting_id - base64_encoded, image, global setting value
     * @return          : redirect to global setting list page
     */

    public function editGlobalSettingPost(Request $request) {
        $input = $request->all();
        $global_setting_id = $request->global_setting_id;
        $global_setting_id = base64_decode($global_setting_id);
        if (isset($input['logo'])) {
            $file = Input::file('logo');
            $fileArray = array('image' => $file);
            $messages = [
                'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
                'image.image' => 'The image must be an image.',
            ];
            $rules = array(
                'image' => 'image|mimes:jpeg,jpg,png'
            );
            $validator = Validator::make($fileArray, $rules, $messages);
            if ($validator->fails()) {
                return redirect('global-setting/edit/' . base64_encode($global_setting_id))
                                ->withErrors($validator)
                                ->withInput();
            } else {
                if ($file->getSize() < 1048576) {
                    $file = Input::file('logo');
                    $destinationPath = 'uploads';

                    $logoimage = $request->file('logo');
                    $random_image_name = time() . rand(0, 999) . '.' . $logoimage->getClientOriginalExtension();
                    $file->move($destinationPath, $random_image_name);
                    $global_setting_data = GlobalSetting::find($global_setting_id);

                    $delete_file = $global_setting_data->value;
                    if (\File::exists(public_path('/uploads/' . $delete_file))) {
                        \File::delete(public_path('/uploads/' . $delete_file));
                    }

                    $global_setting_data->value = $random_image_name;
                    $query = $global_setting_data->save();
                    return redirect('/global-setting')->with('success', \Config::get('constants.GLOBALSETTING_RECORD_UPDATED'));
                } else {
                    return redirect('/global-setting/edit/' . base64_encode($global_setting_id))->with('error', \Config::get('constants.GLOBALSETTING_LOGO_LIMIT_1MB_ERR'));
                }
            }
        } else {
            $messages = [
                'global_setting_value.required' => 'Value field is required.',
            ];

            $validator = Validator::make($request->all(), [
                        'global_setting_value' => 'required',
                            ], $messages);
            if ($validator->fails()) {
                return redirect('/global-setting/edit/' . base64_encode($global_setting_id))
                                ->withErrors($validator)
                                ->withInput();
            } else {
                $global_setting_data = GlobalSetting::find($global_setting_id);
                if (empty($global_setting_data)) {
                    return redirect('/')->with('error', 'Record not found.');
                } else {
                    $global_setting_data->value = $input['global_setting_value'];
                    $query = $global_setting_data->save();
                    return redirect('/global-setting')->with('success', \Config::get('constants.GLOBALSETTING_RECORD_UPDATED'));
                }
            }
        }
    }

}
