<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Slider;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SliderController extends Controller {
    /*
     * @funcation name  : index
     * function details : list of Slider
     * @Param           : null
     * @return          : null
     */

    public function index() {
        return view('admin::slider.list');
    }

    /*
     * @funcation name  : getsliderData
     * function details : get Slider data
     * @Param           : null
     * @return          : Slider data with datatable
     */

    public function getsliderData() {
        $all_slider = Slider::all();
        return Datatables::of($all_slider)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            return '<a class="btn btn-sm btn-primary" href="' . url('/slider/edit/' . base64_encode($row->id)) . '">Edit</a> ' .
                                    '<button class="btn btn-sm btn-primary remove"  onClick="deleteSlider(' . $row->id . ');">Delete</button>';
                        })
                        ->editColumn('created_at', function ($row) {
                            if ($row->created_at) {
                                return date('d-m-Y', strtotime($row->created_at));
                            } else {
                                return "--";
                            }
                        })
                        ->removeColumn('slider_name')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    /*
     * @funcation name  : addSlider
     * function details : Add Slider Detail single rectord
     * @Param           : null
     * @return          : Slider add form
     */

    public function addSlider() {
        return view('admin::slider.add');
    }

    /*
     * @funcation name  : addSliderPost
     * function details : add Slider Detail single record
     * @Param           : slider_title, image_name, image_title, image_description
     * @return          : redirect to Slider List page
     */

    public function addSliderPost(Request $request) {
        $input = $request->all();
        if (isset($input['image_file'])) {
            $file = Input::file('image_file');
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
                return redirect('slider/add/')
                                ->withErrors($validator)
                                ->withInput();
            } else {
                if ($file->getSize() < 1048576) {
                    $file = Input::file('image_file');
                    $destinationPath = 'slider_image';

                    $logoimage = $request->file('image_file');
                    $time_rand_str = time() . rand(0, 999);

                    $name_str1 = ''; //'_500_300'; // 500 X 300
                    $name_str2 = '_1178_400'; // 1178 400
                    $name_str3 = '_1500_800'; // 1500 300

                    $random_image_name_val = $time_rand_str . '.' . $logoimage->getClientOriginalExtension();
                    $random_image_name1 = $time_rand_str . $name_str1 . '.' . $logoimage->getClientOriginalExtension();

                    $img = Image::make($request->file('image_file')->getRealPath());

                    $img->fit(700, 400);
                    $img->resize(700, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name1);

                    $random_image_name2 = $time_rand_str . $name_str2 . '.' . $logoimage->getClientOriginalExtension();

                    $img->fit(1178, 400);
                    $img->resize(1178, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name2);

                    $random_image_name3 = $time_rand_str . $name_str3 . '.' . $logoimage->getClientOriginalExtension();
                    $img->fit(1500, 800);
                    $img->resize(1500, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name3);
//                    $file->move($destinationPath, $random_image_name);
                } else {
                    return redirect('/slider/add/')->with('error', \Config::get('constants.SLIDER_LOGO_LIMIT_1MB_ERR'));
                }
            }
        }
        $messages = [
            'slider_title.required' => 'Slider Title field is required.',
            'image_file.required' => 'Please select image.',
        ];

        $validator = Validator::make($request->all(), [
                    'slider_title' => 'required',
                    'image_file' => 'required',
                        ], $messages);
        if ($validator->fails()) {
            return redirect('/slider/add/')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $add_slider_data = new Slider;
            $add_slider_data->insert([
                'slider_title' => $input['slider_title'],
                'image_name' => $random_image_name_val,
                'image_title' => $input['image_title'],
                'image_description' => $input['image_description'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect('/slider')->with('success', \Config::get('constants.SLIDER_RECORD_ADDED'));
        }
    }

    /*
     * @funcation name  : editSlider
     * function details : edit Slider Detail single record
     * @Param           : slider_id
     * @return          : slider detail to edit page
     */

    public function editSlider(Request $request) {
        $slider_id = $request->slider_id;
        $slider_id = base64_decode($slider_id);
        $slider_data = Slider::find($slider_id);
        return view('admin::slider.edit', compact('slider_data'));
    }

    /*
     * @funcation name  : editSliderPost
     * function details : update Slider Detail single record
     * @Param           : slider_id - base64_decode, slider_title, image_title, image_description
     * @return          : slider detail to edit page
     */

    public function editSliderPost(Request $request) {
        $input = $request->all();
        $slider_id = $request->slider_id;
        $slider_id = base64_decode($slider_id);

        if (isset($input['image_file'])) {
            $file = Input::file('image_file');
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
                return redirect('slider/edit/' . base64_encode($slider_id))
                                ->withErrors($validator)
                                ->withInput();
            } else {
                if ($file->getSize() < 1048576) {
                    $file = Input::file('image_file');
                    $destinationPath = 'slider_image';

                    $logoimage = $request->file('image_file');
                    $time_rand_str = time() . rand(0, 999);

                    $name_str1 = ''; //'_500_300'; // 500 X 300
                    $name_str2 = '_1178_400'; // 700 X 400
                    $name_str3 = '_1500_800'; // 1178 X 800

                    $random_image_name_val = $time_rand_str . '.' . $logoimage->getClientOriginalExtension();
                    $random_image_name1 = $time_rand_str . $name_str1 . '.' . $logoimage->getClientOriginalExtension();

                    $img = Image::make($request->file('image_file')->getRealPath());

                    $img->fit(700, 400);
                    $img->resize(700, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name1);

                    $random_image_name2 = $time_rand_str . $name_str2 . '.' . $logoimage->getClientOriginalExtension();

                    $img->fit(1178, 400);
                    $img->resize(1178, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name2);

                    $random_image_name3 = $time_rand_str . $name_str3 . '.' . $logoimage->getClientOriginalExtension();
                    $img->fit(1500, 800);
                    $img->resize(1500, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $random_image_name3);

//                    $file->move($destinationPath, $random_image_name);
                    $slider_data = Slider::find($slider_id);


                    $delete_file = $slider_data->image_name;
                    $ext = pathinfo($delete_file, PATHINFO_EXTENSION);
                    $file_name_val = rtrim($delete_file, "." . $ext);

                    $delete_file_name2 = $file_name_val . '_1178_400.' . $ext; // 1178 400
                    $delete_file_name3 = $file_name_val . '_1500_800.' . $ext; // 1500 800

                    if (\File::exists(public_path('/slider_image/' . $delete_file))) {
                        \File::delete(public_path('/slider_image/' . $delete_file));
                    }
                    if (\File::exists(public_path('/slider_image/' . $delete_file_name2))) {
                        \File::delete(public_path('/slider_image/' . $delete_file_name2));
                    }
                    if (\File::exists(public_path('/slider_image/' . $delete_file_name3))) {
                        \File::delete(public_path('/slider_image/' . $delete_file_name3));
                    }

                    $query = $slider_data->delete();

                    $slider_data->image_name = $random_image_name_val;
                    $query = $slider_data->save();
//                    return redirect('/slider')->with('success', \Config::get('constants.SLIDER_RECORD_UPDATED'));
                } else {
                    return redirect('/slider/edit/' . base64_encode($slider_id))->with('error', \Config::get('constants.SLIDER_LOGO_LIMIT_1MB_ERR'));
                }
            }
        }
        $messages = [
            'slider_title.required' => 'Slider Title field is required.',
        ];
        $validator = Validator::make($request->all(), [
                    'slider_title' => 'required',
                        ], $messages);
        if ($validator->fails()) {
            return redirect('/slider/edit/' . base64_encode($slider_id))
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $slider_data = Slider::find($slider_id);
            if (empty($slider_data)) {
                return redirect('/')->with('error', 'Record not found.');
            } else {
                $slider_data->slider_title = $input['slider_title'];
                $slider_data->image_title = $input['image_title'];
                $slider_data->image_description = $input['image_description'];
                $query = $slider_data->save();

                return redirect('/slider')->with('success', \Config::get('constants.SLIDER_RECORD_UPDATED'));
            }
        }
    }

    /*
     * @funcation name  : deleteSlider
     * function details : delete Slider single record
     * @Param           : slider_id
     * @return          : redirect to Slider List page
     */

    public function deleteSlider(Request $request) {
        $slider_id = $request->slider_id;
        $obj_slider = Slider::find($slider_id);

        $delete_file = $obj_slider->image_name;
        $ext = pathinfo($delete_file, PATHINFO_EXTENSION);
        $file_name_val = rtrim($delete_file, "." . $ext);

        $delete_file_name2 = $file_name_val . '_1178_400.' . $ext; // 1178 400
        $delete_file_name3 = $file_name_val . '_1500_800.' . $ext; // 1500 800

        if (\File::exists(public_path('/slider_image/' . $delete_file))) {
            \File::delete(public_path('/slider_image/' . $delete_file));
        }
        if (\File::exists(public_path('/slider_image/' . $delete_file_name2))) {
            \File::delete(public_path('/slider_image/' . $delete_file_name2));
        }
        if (\File::exists(public_path('/slider_image/' . $delete_file_name3))) {
            \File::delete(public_path('/slider_image/' . $delete_file_name3));
        }

        $query = $obj_slider->delete();
        print_r(json_encode(array('errorCode' => '0')));
    }

}
