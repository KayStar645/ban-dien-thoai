<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableBinhluan;
use App\Models\Tables\TableKhachhang;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KhanhhangModel extends TableKhachhang {

    protected $fillable = [
        TableKhachhang::COL_MA_KH,
        TableKhachhang::COL_TEN_KH,
        TableKhachhang::COL_SDT_KH,
        TableKhachhang::COL_DIACHI_KH,
        TableKhachhang::COL_EMAIL,
        TableKhachhang::COL_GIOITINH_KH
    ];

    public function phieuXuats() {
        return $this->hasMany(PhieuxuatModel::class,
            TableKhachhang::COL_MA_KH, TablePhieuxuat::COL_MA_KH);
    }

    public function binhLuans() {
        return $this->hasMany(BinhluanModel::class,
            TableKhachhang::COL_MA_KH, TableBinhluan::COL_MA_KH);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
