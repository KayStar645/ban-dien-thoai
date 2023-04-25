<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableMausac;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MausacModel extends TableMausac {

    protected $fillable = [
        TableMausac::COL_ID_MAU,
        TableMausac::COL_TENMAU,
        TableMausac::COL_MA_SP
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableMausac::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public $timestamps = false;
    use HasFactory;
}
