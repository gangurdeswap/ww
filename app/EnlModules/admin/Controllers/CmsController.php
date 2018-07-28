<?php

namespace App\EnlModules\admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\CmsPage;
use Illuminate\Support\Facades\Config;
use App\CmsPagesLang;
use AdminConstant;

class CmsController extends Controller {

    public function index() {
        // to load cms page list
        return view('admin::cms.list');
    }

    public function getCmsData() {
        $all_cms = CmsPage::all();
        return Datatables::of($all_cms)
                        ->addIndexColumn()
                        ->addColumn('page_name', function($row) {
                            return ucfirst(implode(' ', explode('-', $row->page_name)));
                        })
                        ->addColumn('action', function ($row) {
                            return '<a class="btn btn-sm btn-primary" href="' . url('/cms/edit/' . base64_encode($row->id)) . '">Edit</a>';
                        })
                        ->removeColumn('created_at')
                        ->removeColumn('updated_at')
                        ->make(true);
    }

    public function editCms(Request $request) {
        // This method to load edit view of CMS
        $cms_id = $request->cms_id;
        $cms_id = base64_decode($cms_id);
        $cms_info = CmsPage::find($cms_id);
        if (empty($cms_info)) {
            return redirect('/cms')->with('error', AdminConstant::getC('CMS_RECORD_NOT_FOUND'));
        }
        return view('admin::cms.edit', compact('cms_info'));
    }

    public function editCmsPost(Request $request) {
        // This method to save edited CMS
        $cms_id = $request->cms_id;
        $cms_id = base64_decode($cms_id);
        $cms_info = CmsPage::find($cms_id);
        if (empty($cms_info)) {
            return redirect('/cms')->with('error', Config::get('constants.CMS_RECORD_NOT_FOUND'));
        }
        $input = $request->all();
        $cms = CmsPagesLang::updateOrCreate(
                        // First array is condition and second is value to be updated or inserted
                        ['lang_id' => \Illuminate\Support\Facades\App::getLocale(), 'cms_page_id' => $cms_info->id], ['cms_page_id' => $cms_info->id, 'page_title' => $input['page_title'], 'page_content' => $input['page_content']]
        );
        return redirect('/cms')->with('success', AdminConstant::getC('CMS_RECORD_UPDATED'));
    }

}
