@extends('layouts.admin-dashboard')
@section('title', 'Reply')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reply
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/contact-us')}}"><i class="fa fa-phone"></i> Contact Us</a></li>
            <li class="active">Reply</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-warning">

            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email</label>
                        <div class="form-control">{{$contact_details->email}}</div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" readonly="">{{$contact_details->message}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Reply Text</label>
                        <textarea class="form-control" placeholder="Enter ..." name="reply_text" id="reply_text">{{!empty($contact_details->replies)?$contact_details->replies->reply_text:''}}</textarea>
                    </div>
                    @if(empty($contact_details->replies))
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                    @endif

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
<script src="{{asset('/js/admin/reply-contact-us.js')}}"></script>
@endsection
