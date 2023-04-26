<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieunhap;
use App\Models\Tables\TablePhieunhap;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitietphieunhapModel extends TableChitietphieunhap {

    protected $fillable = [
        TableChitietphieunhap::COL_ID_PN,
        TableChitietphieunhap::COL_ID_SP,
        TableChitietphieunhap::COL_SOLUONGNHAP,
        TableChitietphieunhap::COL_GIANHAP
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableChitietphieunhap::COL_ID_SP, TableSanpham::COL_ID_SP);
    }

    public function phieuNhap() {
        return $this->belongsTo(PhieunhapModel::class,
            TableChitietphieunhap::COL_ID_PN, TablePhieunhap::COL_ID_PN);
    }

    public $timestamps = false;
    use HasFactory;
}
