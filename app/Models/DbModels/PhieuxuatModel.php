<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieuxuat;
use App\Models\Tables\TableKhachhang;
use App\Models\Tables\TableNhanvien;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhieuxuatModel extends TablePhieuxuat {

    protected $fillable = [
        TablePhieuxuat::COL_ID_PX,
        TablePhieuxuat::COL_ID_NV,
        TablePhieuxuat::COL_ID_KH,
        TablePhieuxuat::COL_NGAYDATHANG,
        TablePhieuxuat::COL_TONGTIEN_PX,
        TablePhieuxuat::COL_TINHTRANG_PX
    ];

    public function khachHang() {
        return $this->belongsTo(KhachHangModel::class,
            TablePhieuxuat::COL_ID_KH, TableKhachhang::COL_ID_KH);
    }

    public function nhanVien() {
        return $this->belongsTo(NhanvienModel::class,
            TablePhieuxuat::COL_ID_NV, TableNhanvien::COL_ID_NV);
    }

    public function chiTietPhieuXuats() {
        return $this->hasMany(ChitietphieuxuatModel::class,
            TablePhieuxuat::COL_ID_PX, TableChitietphieuxuat::COL_ID_PX);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
