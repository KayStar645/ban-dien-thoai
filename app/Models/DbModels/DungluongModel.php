<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DungluongModel extends TableDungluong {

    protected $fillable = [
        TableDungluong::COL_ID_DL,
        TableDungluong::COL_TEN_DL,
        TableDungluong::COL_ID_SP,
    ];

    public function sanPham() {
        return $this->belongsTo(SanphamModel::class,
            TableDungluong::COL_ID_SP, TableSanpham::COL_ID_SP);
    }

    public $timestamps = false;
    use HasFactory;
}
