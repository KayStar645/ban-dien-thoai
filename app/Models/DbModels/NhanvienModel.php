<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableCuahang;
use App\Models\Tables\TableNhanvien;
use App\Models\Tables\TablePhieunhap;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhanvienModel extends TableNhanvien {

    protected $fillable = [
        TableNhanvien::COL_ID_NV,
        TableNhanvien::COL_TEN_NV,
        TableNhanvien::COL_SDT_NV,
        TableNhanvien::COL_DIACHI_NV,
        TableNhanvien::COL_GIOITINH_NV,
        TableNhanvien::COL_NGAYSINH,
        TableNhanvien::COL_TEN_CH
    ];

    public function cuaHang() {
        return $this->belongsTo(CuahangModel::class,
            TableNhanvien::COL_TEN_CH, TableCuahang::COL_TEN_CH);
    }

    public function phieuNhaps() {
        return $this->hasMany(PhieunhapModel::class,
            TableNhanvien::COL_ID_NV, TablePhieunhap::COL_ID_NV);
    }

    public function phieuXuats() {
        return $this->hasMany(PhieuxuatModel::class,
            TableNhanvien::COL_ID_NV, TablePhieuxuat::COL_ID_NV);
    }

    public $timestamps = false;
    use HasFactory;
}
