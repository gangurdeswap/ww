@extends('layouts.admin-dashboard')
@section('title', 'Edit Slider')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Slider
            <small>Edit Slider Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/slider')}}"><i class="fa fa-file-text"></i> Slider</a></li>
            <li class="active">Edit Slider</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Slider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form name="edit_slider_form" id="edit_slider_form" role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Slider Title</label>
                        <input type="text" class="form-control" placeholder="Enter Slider Title" name="slider_title" id="slider_title" value="{{ ($slider_data->slider_title) ? $slider_data->slider_title : '' }}"  >

                        @if ($errors->has('slider_title'))
                        <div class="text-danger">{{ $errors->first('slider_title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Select image to upload:</label>
                        <input type="file" name="image_file" id="image_file"> 
                        <br/>

                        @if ($slider_data->image_name)
                        <img src="{{ asset('/slider_image/'.$slider_data->image_name) }}" title="image_file" height="150" width="150" />
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image Title</label>
                        <input type="text" class="form-control" placeholder="Enter Image Title" name="image_title" id="image_title" value="{{ ($slider_data->image_title) ? $slider_data->image_title : '' }}"  >

                        @if ($errors->has('image_title'))
                        <div class="text-danger">{{ $errors->first('image_title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image description</label>
                        <textarea class="form-control" name="image_description" id="image_description">{{ ($slider_data->image_description) ? $slider_data->image_description : '' }}</textarea>

                        @if ($errors->has('image_description'))
                        <div class="text-danger">{{ $errors->first('image_description') }}</div>
                        @endif
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="slider_id" id="slider_id" value="{{base64_encode($slider_data->id)}}" />
                        <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                        <a class="btn btn-default" href="{{ url('/slider') }}">Cancel</a>
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
<script src="{{asset('/js/admin/edit_slider.js')}}"></script>
@endsection
