@extends('layouts.admin_layout.admin_layout')
@section('title')
    Cập nhật chi tiết tài khoản
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
                        <h1 class="m-0">Cập nhật chi tiết tài khoản</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">    Cập nhật chi tiết tài khoản </li>
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
                                <h3 class="card-title">Cập nhật chi tiết</h3>
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

                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <!-- form start -->
                            <form role="form" method="post" action="{{url('/admin/update-admin-details')}}" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên </label>
                                        <input class="form-control" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}" type="text"
                                               id="admin_name" name="admin_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input class="form-control" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->email}}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">loại quản trị </label>
                                        <input class="form-control" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->type}}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">số điện thoại </label>
                                        <input class="form-control" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->mobile}}" type="text"
                                               id="admin_mobile" name="admin_mobile">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">image</label>
                                        <input class="form-control" type="file" id="admin_image" name="admin_image" accept="image/*">
                                        @if(!empty(\Illuminate\Support\Facades\Auth::guard('admin')->user()->image))
                                            <a href="{{url('images/admin_images/admin_photos/'.\Illuminate\Support\Facades\Auth::guard('admin')->user()->image)}}" target="_blank">View image</a>
                                            <input type="hidden" name="current_admin_image" value="{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->image}}">
                                        @endif
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
@endpush
