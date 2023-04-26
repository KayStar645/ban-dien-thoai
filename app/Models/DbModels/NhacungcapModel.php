<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableNhacungcap;
use App\Models\Tables\TablePhieunhap;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhacungcapModel extends TableNhacungcap {

    protected $fillable = [
        TableNhacungcap::COL_ID_NCC,
        TableNhacungcap::COL_TEN_NCC,
        TableNhacungcap::COL_SDT_NCC,
        TableNhacungcap::COL_DIACHI_NCC
    ];

    public function phieuNhaps() {
        return $this->hasMany(PhieunhapModel::class,
            TableNhacungcap::COL_ID_NCC, TablePhieunhap::COL_ID_NCC);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
