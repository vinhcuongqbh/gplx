@extends('layouts.master')

@section('title', 'Quản lý Khóa học')

@section('heading')
    <h3>Quản lý Khóa học</h3>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <form action="{{ route('admin.khoahoc') }}" method="get" id="form-search">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-2 my-2">
                                    <input type="text" class="form-control" id="MaKH" name="MaKH"
                                        placeholder="Nhập mã Khóa học">
                                </div>
                                <div class="col-12 col-sm-2 my-2">
                                    <button type="submit" class="btn bg-olive text-white w-100">Tìm kiếm</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card-header -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <table id="index-table" class="table table-bordered bg-white">
                    <thead style="text-align: center">
                        <tr>
                            <th class="text-nowrap">STT</th>
                            <th class="text-nowrap">Mã Khóa học</th>
                            <th class="text-nowrap">Cơ sở đào tạo</th>
                            <th class="text-nowrap">Hạng đào tạo</th>
                            <th class="text-nowrap">Số lượng học viên</th>
                            <th class="text-nowrap">Ngày Gửi</th>
                            <th class="text-nowrap">Ngày Tiếp nhận</th>
                            <th class="text-nowrap">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($khoahocs as $khoahoc)
                            <tr>
                                <td class="text-center"> {{ $i }}</td>
                                <td class="text-center text-bold">{{ $khoahoc->MaKH }}</td>
                                <td class="text-center">{{ $khoahoc->TenDV }}</td>
                                <td class="text-center">{{ $khoahoc->HangDT }}</td>
                                <td class="text-center">{{ $khoahoc->TongSoHV }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($khoahoc->NguoiGui)) }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($khoahoc->NgayTao)) }}</td>
                                <td class="text-center"><a class="btn btn-warning w-100 text-nowrap"
                                        href="{{ route('admin.khoahoc.edit', $khoahoc->MaKH) }}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@stop

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">

@stop

@section('js')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendor/jszip/jszip.min.js"></script>
    <script src="/vendor/pdfmake/pdfmake.min.js"></script>
    <script src="/vendor/pdfmake/vfs_fonts.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#index-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "pageLength": 25,
                "searching": false,
                "autoWidth": false,
                "ordering": false,
                //"buttons": ["copy", "excel", "pdf", "print"],                
            }).buttons().container().appendTo('#store-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
