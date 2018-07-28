@extends('layouts.admin-dashboard')
@section('title', 'Add User Detail')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add User Detail
            <small>Add User Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/user')}}"><i class="fa fa-file-text"></i> User Management</a></li>
            <li class="active">Add User Detail</li>
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
                <form  name="add_user_form" id="add_user_form" role="form" method="post" >
                    {{csrf_field()}}
                    <!-- text input -->
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" id="first_name" value="{{ old('first_name') }}" >
                        @if ($errors->has('first_name'))
                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                        @endif 
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" id="last_name" value="{{ old('last_name') }}">
                        @if ($errors->has('last_name'))
                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <br/>
                        <input type="radio" name="user_type" value="0" checked="" />
                        <label for="admin" >Admin</label>

                        <input type="radio" name="user_type" value="1" />
                        <label for="admin" >User</label>

                        @if ($errors->has('user_type'))
                        <div class="text-danger">{{ $errors->first('user_type') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>User Status</label>
                        <br/>
                        <input type="radio" name="user_status" value="0" checked="" />
                        <label for="admin" >Inactive</label>

                        <input type="radio" name="user_status" value="1" />
                        <label for="admin" >Active</label>

                        <input type="radio" name="user_status" value="2" />
                        <label for="admin" >Blocked</label>

                        @if ($errors->has('user_status'))
                        <div class="text-danger">{{ $errors->first('user_status') }}</div>
                        @endif
                    </div>
                    <div class="box-footer">
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
<script src="{{asset('/js/admin/add_user.js')}}"></script>
@endsection
