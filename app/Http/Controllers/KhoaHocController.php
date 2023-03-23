<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoaHoc;
use App\Models\BaoCaoI;
use App\Models\NguoiLX_HoSo;
use App\Models\NguoiLX;
use Illuminate\Support\Facades\Redirect;


class KhoaHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->MaKH)) $MaKH = $request->MaKH;
        else $MaKH = "";
        $khoahocs = KhoaHoc::where('KhoaHoc.MaKH', $MaKH)
            ->leftjoin('BaoCaoI', 'BaoCaoI.MaKH', 'KhoaHoc.MaKH')
            ->leftjoin('DM_DonViGTVT', 'DM_DonViGTVT.MaDV', 'KhoaHoc.MaCSDT')
            ->select('KhoaHoc.*', 'BaoCaoI.NguoiGui', 'DM_DonViGTVT.TenDV')
            ->get();

        return view('admin.khoahoc.index', ['khoahocs' => $khoahocs]);
    }


    public function show(string $MaKH)
    {
        $khoahoc = KhoaHoc::where('KhoaHoc.MaKH', $MaKH)
            ->leftjoin('BaoCaoI', 'BaoCaoI.MaKH', 'KhoaHoc.MaKH')
            ->select('KhoaHoc.*', 'BaoCaoI.NguoiGui')
            ->first();

        return view('admin.khoahoc.show', ['khoahoc' => $khoahoc]);
    }

    public function edit(string $MaKH)
    {
        $khoahoc = KhoaHoc::where('KhoaHoc.MaKH', $MaKH)
            ->leftjoin('BaoCaoI', 'BaoCaoI.MaKH', 'KhoaHoc.MaKH')
            ->select('KhoaHoc.*', 'BaoCaoI.NguoiGui')
            ->first();

        return view('admin.khoahoc.edit', ['khoahoc' => $khoahoc]);
    }



    public function update(Request $request, string $MaKH)
    {
        //Bước chuẩn bị
        $khoahoc = KhoaHoc::where('KhoaHoc.MaKH', $MaKH)
            ->leftjoin('BaoCaoI', 'BaoCaoI.MaKH', 'KhoaHoc.MaKH')
            ->select('KhoaHoc.*', 'BaoCaoI.NguoiGui')
            ->first();

        $ngay_gui = $request->ngay_gui . " " . $request->gio_gui . substr($khoahoc->NguoiGui, 16, strlen($khoahoc->NguoiGui) - 16);
        $ngay_tiep_nhan = $request->ngay_tiep_nhan . " " . $request->gio_tiep_nhan . substr($khoahoc->NgayTao, 16, strlen($khoahoc->NgayTao) - 16);


        //Update Khóa học
        $khoahoc = KhoaHoc::where('MaKH', $MaKH)
            ->update([
                'NgayTao' => $ngay_tiep_nhan,
                'NgaySua' => $ngay_tiep_nhan
            ]);

        //Update Báo cáo I
        $baocao1 = BaoCaoI::where('MaKH', $MaKH)
            ->update([
                'NgayTao' => $ngay_tiep_nhan,
                'NgaySua' => $ngay_tiep_nhan,
                'NgayGui' => $ngay_tiep_nhan,
                'NguoiGui' => $ngay_gui,
            ]);

        //Update NguoiLX_HoSo và NguoiLX
        $nguoilx_hoso = NguoiLX_HoSo::where('MaKhoaHoc', $MaKH)->get();
        foreach ($nguoilx_hoso as $hoso) {
            $ngay_tiep_nhan_ca_nhan = $request->ngay_tiep_nhan . " " . $request->gio_tiep_nhan . substr($hoso->NgayTao, 16, strlen($hoso->NgayTao) - 16);

            //Update NguoiLX_Hoso
            $nguoilx_hoso = NguoiLX_HoSo::where('MaDK', $hoso->MaDK)
                ->update([
                    'NgayTao' => $ngay_tiep_nhan_ca_nhan,
                ]);

            //Update NguoiLX
            $nguoilx_hoso = NguoiLX::where('MaDK', $hoso->MaDK)
                ->update([
                    'NgayTao' => $ngay_tiep_nhan_ca_nhan,
                    'NgaySua' => $ngay_tiep_nhan_ca_nhan,
                ]);
        }

        return Redirect::route('admin.khoahoc.show', $MaKH);
    }
}
