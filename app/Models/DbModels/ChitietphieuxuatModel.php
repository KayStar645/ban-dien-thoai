<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieuxuat;
use App\Models\Tables\TablePhieuxuat;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitietphieuxuatModel extends TableChitietphieuxuat {

    protected $fillable = [
        TableChitietphieuxuat::COL_MA_PX,
        TableChitietphieuxuat::COL_MA_SP,
        TableChitietphieuxuat::COL_SOLUONGXUAT
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableChitietphieuxuat::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public function phieuXuat() {
        return $this->belongsTo(PhieuxuatModel::class,
            TableChitietphieuxuat::COL_MA_PX, TablePhieuxuat::COL_MA_PX);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
