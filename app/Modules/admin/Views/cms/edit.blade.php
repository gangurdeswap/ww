@extends('layouts.admin-dashboard')
@section('title', 'Edit Cms')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit CMS
            <small>Edit cms pages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/cms')}}"><i class="fa fa-file-text"></i> Cms Pages</a></li>
            <li class="active">Edit CMS</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">{{ucfirst(implode(' ',explode('-',$cms_info->page_name)))}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post">
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="page_title" id="page_title" value="{{isset($cms_info->cmsLang)?$cms_info->cmsLang->page_title:''}}">
                    </div>
                    <div class="form-group">
                        <label>Page Content</label>
                        <textarea class="form-control" placeholder="Enter ..." name="page_content" id="page_content">{{isset($cms_info->cmsLang)?$cms_info->cmsLang->page_content:''}}</textarea>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js_content')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src        ="{{asset('/js/admin/edit_cms.js')}}"></script>
@endsection
