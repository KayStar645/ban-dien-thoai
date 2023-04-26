<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Tables\TableAnhsanpham;

class AnhsanphamModel extends TableAnhsanpham {


    protected $fillable = [
        TableAnhsanpham::COL_ID_ANHSP,
        TableAnhsanpham::COL_ID_SP,
        TableAnhsanpham::COL_ANH_URL
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanphamModel::class,
            TableAnhsanpham::COL_ID_SP, TableSanpham::COL_ID_SP);
    }

    public $timestamps = false;
    use HasFactory;
}
