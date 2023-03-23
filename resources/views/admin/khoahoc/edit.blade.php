@extends('layouts.master')

@section('title', 'Quản lý Khóa học')

@section('heading')
    {{ __('Quản lý khóa học') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title text-bold">Thông tin Khóa học</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.khoahoc.update', $khoahoc->MaKH) }}" method="post" id="khoahoc-edit"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="MaKH">Mã Khóa học</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="MaKH" name="MaKH" value="{{ $khoahoc->MaKH }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="thoi_diem_gui">Ngày Gửi</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" id="ngay_gui" name="ngay_gui"
                                        value="{{ date('Y-m-d', strtotime($khoahoc->NguoiGui)) }}" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <input type="time" id="gio_gui" name="gio_gui"
                                        value="{{ date('H:i', strtotime($khoahoc->NguoiGui)) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="thoi_diem_tiep_nhan">Ngày Tiếp nhận</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" id="ngay_tiep_nhan" name="ngay_tiep_nhan"
                                        value="{{ date('Y-m-d', strtotime($khoahoc->NgayTao)) }}" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <input type="time" id="gio_tiep_nhan" name="gio_tiep_nhan"
                                        value="{{ date('H:i', strtotime($khoahoc->NgayTao)) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning w-100 text-nowrap m-1">Cập nhật</button>
                            <a class="btn bg-olive text-white w-100 text-nowrap m-1"
                                href="{{ route('admin.khoahoc') }}">Thoát</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@stop

@section('js')
    <!-- jquery-validation -->
    <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/vendor/jquery-validation/additional-methods.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#store-edit').validate({
                rules: {
                    ngay_tao: {
                        required: true,
                    },
                    ngay_sua: {
                        required: true,
                    },
                },
                messages: {
                    ngay_tao: {
                        required: "Vui lòng nhập nội dung",
                    },
                    ngay_sua: {
                        required: "Vui lòng nhập nội dung",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-sm-9').append(error);

                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@stop
