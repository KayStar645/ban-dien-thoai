<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableDanhmucsanpham;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhmucsanphamModel extends TableDanhmucsanpham {

    protected $fillable = [
        TableDanhmucsanpham::COL_ID_DMSP,
        TableDanhmucsanpham::COL_TEN_DM
    ];

    public function sanPhams() {
        return $this->hasMany(SanphamModel::class,
            TableDanhmucsanpham::COL_ID_DMSP, TableSanpham::COL_ID_DMSP);
    }

    public $timestamps = false;
    use HasFactory;
}
