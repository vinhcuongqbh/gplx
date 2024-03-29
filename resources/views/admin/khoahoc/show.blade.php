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
                                    value="{{ date('Y-m-d', strtotime($khoahoc->NguoiGui)) }}" class="form-control"
                                    disabled>
                            </div>
                            <div class="col-sm-3">
                                <input type="time" id="gio_gui" name="gio_gui"
                                    value="{{ date('H:i', strtotime($khoahoc->NguoiGui)) }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="thoi_diem_tiep_nhan">Ngày Tiếp nhận</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" id="ngay_tiep_nhan" name="ngay_tiep_nhan"
                                    value="{{ date('Y-m-d', strtotime($khoahoc->NgayTao)) }}" class="form-control" disabled>
                            </div>
                            <div class="col-sm-3">
                                <input type="time" id="gio_tiep_nhan" name="gio_tiep_nhan"
                                    value="{{ date('H:i', strtotime($khoahoc->NgayTao)) }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn bg-warning text-white w-100 text-nowrap m-1"
                            href="{{ route('admin.khoahoc.edit', $khoahoc->MaKH) }}">Sửa</a>
                        <a class="btn bg-olive text-white w-100 text-nowrap m-1"
                            href="{{ route('admin.khoahoc') }}">Thoát</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@stop

@section('js')
@stop
