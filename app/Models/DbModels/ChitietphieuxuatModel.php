<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableChitietphieuxuat;
use App\Models\Tables\TablePhieuxuat;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChitietphieuxuatModel extends TableChitietphieuxuat {

    protected $fillable = [
        TableChitietphieuxuat::COL_ID_PX,
        TableChitietphieuxuat::COL_ID_SP,
        TableChitietphieuxuat::COL_SOLUONGXUAT
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableChitietphieuxuat::COL_ID_SP, TableSanpham::COL_ID_SP);
    }

    public function phieuXuat() {
        return $this->belongsTo(PhieuxuatModel::class,
            TableChitietphieuxuat::COL_ID_PX, TablePhieuxuat::COL_ID_PX);
    }

    public $timestamps = false;
    use HasFactory;
}
