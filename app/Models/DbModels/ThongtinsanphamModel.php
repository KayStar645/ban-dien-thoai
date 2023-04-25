<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableSanpham;
use App\Models\Tables\TableThongtinsanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThongtinsanphamModel extends TableThongtinsanpham {

    protected $fillable = [
        TableThongtinsanpham::COL_ID_TTSP,
        TableThongtinsanpham::COL_MA_SP,
        TableThongtinsanpham::COL_THONGTIN,
        TableThongtinsanpham::COL_MOTA_SP
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableThongtinsanpham::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public $timestamps = false;
    use HasFactory;
}
