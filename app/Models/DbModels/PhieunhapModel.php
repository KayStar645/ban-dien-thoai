<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieunhap;
use App\Models\Tables\TableNhacungcap;
use App\Models\Tables\TableNhanvien;
use App\Models\Tables\TablePhieunhap;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhieunhapModel extends TablePhieunhap {

    protected $fillable = [
        TablePhieunhap::COL_ID_PN,
        TablePhieunhap::COL_ID_NCC,
        TablePhieunhap::COL_ID_NV,
        TablePhieunhap::COL_NGAYNHAP,
        TablePhieunhap::COL_TONGTIEN_PN
    ];

    public function nhaCungCap() {
        return $this->belongsTo(NhacungcapModel::class,
            TablePhieunhap::COL_ID_NCC, TableNhacungcap::COL_ID_NCC);
    }

    public function nhanVien() {
        return $this->belongsTo(NhanvienModel::class,
            TablePhieunhap::COL_ID_NV, TableNhanvien::COL_ID_NV);
    }

    public function chiTietPhieuNhaps() {
        return $this->hasMany(ChitietphieunhapModel::class,
            TablePhieunhap::COL_ID_PN, TableChitietphieunhap::COL_ID_PN);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
