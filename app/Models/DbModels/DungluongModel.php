<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DungluongModel extends TableDungluong {

    protected $fillable = [
        TableDungluong::COL_ID_DL,
        TableDungluong::COL_TEN_DL,
        TableDungluong::COL_MA_SP,
    ];

    public function sanPhams() {
        return $this->hasMany(SanphamModel::class,
            TableDungluong::COL_MA_SP, TableSanpham::COL_MA_SP);
    }

    public $timestamps = false;
    use HasFactory;
}
