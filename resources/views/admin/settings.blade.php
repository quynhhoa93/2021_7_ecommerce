@extends('layouts.admin_layout.admin_layout')
@section('title')
    Đổi mật khẩu
@endsection
@push('css')
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Đổi mật khẩu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Đổi mật khẩu</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cập nhật mật khẩu</h3>
                            </div>
                            <!-- /.card-header -->
                            @if(\Illuminate\Support\Facades\Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px ">
                                    {{\Illuminate\Support\Facades\Session::get('error_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(\Illuminate\Support\Facades\Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px ">
                                    {{\Illuminate\Support\Facades\Session::get('success_message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        <!-- form start -->
                            <form role="form" method="post" action="{{url('/admin/update-current-pwd')}}"
                                  name="updatePasswordForm" id="updatePasswordForm">
                                @csrf
                                <div class="card-body">
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputEmail1">Tên </label>--}}
{{--                                        <input class="form-control" value="{{$adminDetails->name}}" type="text"--}}
{{--                                               id="admin_name" name="admin">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input class="form-control" value="{{$adminDetails->email}}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">loại quản trị </label>
                                        <input class="form-control" value="{{$adminDetails->type}}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">mật khẩu cũ</label>
                                        <input type="password" class="form-control" id="current_pwd" name="current_pwd"
                                               placeholder="Password" required="">
                                        <span id="chkCurrentPwd"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">mật khẩu mới</label>
                                        <input type="password" class="form-control" id="new_pwd" name="new_pwd"
                                               placeholder="Password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nhập lại mật khẩu mới</label>
                                        <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd"
                                               placeholder="Password" required="">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('js/admin_js/adminlte.min.js')}}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
