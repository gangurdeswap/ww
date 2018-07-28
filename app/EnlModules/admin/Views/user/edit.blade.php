@extends('layouts.admin-dashboard')
@section('title', 'Edit User Detail')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit User Detail
            <small>Edit User Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/user')}}"><i class="fa fa-file-text"></i> User Management</a></li>
            <li class="active">Edit User Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('layouts/message')
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">User Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  name="edit_user_form" id="edit_user_form" role="form" method="post" >
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="first_name" id="first_name" value="{{ ($user_info->first_name) ? $user_info->first_name : '' }}" >
                        @if ($errors->has('first_name'))
                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="last_name" id="last_name" value="{{ ($user_info->last_name) ? $user_info->last_name : '' }}">
                        @if ($errors->has('last_name'))
                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="email" id="email" value="{{ ($user_info->email) ? $user_info->email : '' }}">
                        @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <br/>
                        <input type="radio" name="user_type" value="0" @if($user_info->user_type==0) checked="" @endif />
                               <label for="admin" >Admin</label>

                        <input type="radio" name="user_type" value="1" @if($user_info->user_type==1) checked="" @endif  />
                               <label for="admin" >User</label>

                        @if ($errors->has('user_type'))
                        <div class="text-danger">{{ $errors->first('user_type') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>User Status</label>
                        <br/>
                        <input type="radio" name="user_status" value="0" @if($user_info->user_status==0) checked="" @endif />
                               <label for="admin" >Inactive</label>

                        <input type="radio" name="user_status" value="1" @if($user_info->user_status==1) checked="" @endif  />
                               <label for="admin" >Active</label>

                        <input type="radio" name="user_status" value="2" @if($user_info->user_status==2) checked="" @endif  />
                               <label for="admin" >Blocked</label>

                        @if ($errors->has('user_status'))
                        <div class="text-danger">{{ $errors->first('user_status') }}</div>
                        @endif
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="user_id" id="user_id" value="{{base64_encode($user_info->id)}}" data-value="{{$user_info->id}}" />
                        <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                        <a class="btn btn-default" href="{{ url('/user') }}">Cancel</a>
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
<script src="{{asset('/js/admin/edit_user.js')}}"></script>
@endsection
