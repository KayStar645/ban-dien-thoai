<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableBinhluan;
use App\Models\Tables\TableKhachhang;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhluanModel extends TableBinhluan {

    protected $fillable = [
        TableBinhluan::COL_ID_BL,
        TableBinhluan::COL_MA_SP,
        TableBinhluan::COL_MA_KH,
        TableBinhluan::COL_NOIDUNG,
        TableBinhluan::COL_NGAY_BL
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableBinhluan::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public function khachHang() {
        return $this->belongsTo(KhanhhangModel::class,
            TableBinhluan::COL_MA_KH, TableKhachhang::COL_MA_KH);
    }

    public $timestamps = false;
    use HasFactory;
}
