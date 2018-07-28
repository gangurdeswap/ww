@extends('layouts.admin-dashboard')
@section('title', 'Add Slider Detail')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Slider Detail
            <small>Add Slider Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/slider')}}"><i class="fa fa-file-text"></i> Slider</a></li>
            <li class="active">Add Slider Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  name="add_slider_form" id="add_slider_form" role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>Slider Title</label>
                        <input type="text" class="form-control" placeholder="Enter Slider Title" name="slider_title" id="slider_title" value="{{ old('slider_title') }}" >

                        @if ($errors->has('slider_title'))
                        <div class="text-danger">{{ $errors->first('slider_title') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Select image to upload:</label>
                        <input type="file" name="image_file" id="file"  >

                        @if ($errors->has('image_file'))
                        <div class="text-danger">{{ $errors->first('image_file') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Image Title</label>
                        <input type="text" class="form-control" placeholder="Enter Image Title" name="image_title" id="image_title" value="{{ old('image_title') }}">

                        @if ($errors->has('image_title'))
                        <div class="text-danger">{{ $errors->first('image_title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Image Description</label>
                        <textarea name="image_description" id="image_description" class="form-control" ></textarea>

                        @if ($errors->has('image_description'))
                        <div class="text-danger">{{ $errors->first('image_description') }}</div>
                        @endif
                    </div>

                    <div class="box-footer">
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
<script src="{{asset('/js/admin/add_slider.js')}}"></script>
@endsection
