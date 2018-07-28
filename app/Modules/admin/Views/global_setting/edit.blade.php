@extends('layouts.admin-dashboard')
@section('title', 'Edit Global Setting')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Global Setting
            <small>Edit Global Setting Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/global-setting')}}"><i class="fa fa-file-text"></i> Global Setting</a></li>
            <li class="active">Edit Global Setting</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Global Setting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  name="global_setting_form" id="global_setting_form" role="form" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="sitename" id="sitename" value="{{ ($global_setting_info->name) ? $global_setting_info->name : '' }}" disabled="">
                    </div>
                    <div class="form-group">
                        <label>Value</label>

                        @if($global_setting_info->field_type =='1')

                        <input type="text" class="form-control" placeholder="Enter ..." name="global_setting_value" id="global_setting_value" value="{{ ($global_setting_info->value) ? $global_setting_info->value : '' }}">
                        @elseif($global_setting_info->field_type =='2')
                        <textarea class="form-control" placeholder="Enter ..." name="global_setting_value" id="global_setting_value">{{ ($global_setting_info->value) ? $global_setting_info->value : '' }}</textarea>
                        @elseif($global_setting_info->field_type =='3')
                        <label>Select image to upload:</label>
                        <input type="file" name="logo" id="file">

                        <br/>
                        @if ($global_setting_info->value)
                        <img  src="{{ asset('/uploads/'.$global_setting_info->value) }}" title="logo" height="150" width="150" />
                        @endif

                        @else
                        @endif

                        @if ($errors->has('global_setting_value'))
                        <div class="text-danger">{{ $errors->first('global_setting_value') }}</div>
                        @endif </div>

                    <div class="box-footer">
                        <input type="hidden" name="global_setting_id" id="global_setting_id" value="{{base64_encode($global_setting_info->id)}}" />
                        <input type="hidden" name="setting_id" id="setting_id" value="{{$global_setting_info->id}}" />

                        <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                        <a class="btn btn-default" href="{{ url('/global-setting') }}">Cancel</a>
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
<script src="{{asset('/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/js/admin/edit_global_setting.js')}}"></script>
@endsection
