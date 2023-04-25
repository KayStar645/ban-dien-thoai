<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableCuahang;
use App\Models\Tables\TableNhanvien;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CuahangModel extends TableCuahang {

    protected $fillable = [
        TableCuahang::COL_TEN_CH,
        TableCuahang::COL_TAIKHOAN,
        TableCuahang::COL_MATKHAU,
        TableCuahang::COL_DIACHI_CH,
        TableCuahang::COL_SDT_CH,
    ];

    public function nhanViens() {
        return $this->hasMany(NhanvienModel::class,
            TableCuahang::COL_TEN_CH, TableNhanvien::COL_TEN_CH);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
