<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieunhap;
use App\Models\Tables\TablePhieunhap;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitietphieunhapModel extends TableChitietphieunhap {

    protected $fillable = [
        TableChitietphieunhap::COL_MA_PN,
        TableChitietphieunhap::COL_MA_SP,
        TableChitietphieunhap::COL_SOLUONGNHAP,
        TableChitietphieunhap::COL_GIANHAP
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableChitietphieunhap::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public function phieuNhap() {
        return $this->belongsTo(PhieunhapModel::class,
            TableChitietphieunhap::COL_MA_PN, TablePhieunhap::COL_MA_PN);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
