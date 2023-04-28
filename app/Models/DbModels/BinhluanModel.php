<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableBinhluan;
use App\Models\Tables\TableKhachhang;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhluanModel extends TableBinhluan {

    protected $fillable = [
        TableBinhluan::COL_ID_BL,
        TableBinhluan::COL_ID_SP,
        TableBinhluan::COL_ID_KH,
        TableBinhluan::COL_NOIDUNG,
        TableBinhluan::COL_NGAY_BL
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableBinhluan::COL_ID_SP, TableSanpham::COL_ID_SP);
    }

    public function khachHang(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(KhachhangModel::class,
            TableBinhluan::COL_ID_KH, TableKhachhang::COL_ID_KH);
    }

    public $timestamps = false;
    use HasFactory;
}
