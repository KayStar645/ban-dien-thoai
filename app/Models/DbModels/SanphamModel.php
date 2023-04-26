<?php

namespace App\Models\DbModels;

use App\Models\Tables\TableAnhsanpham;
use App\Models\Tables\TableBinhluan;
use App\Models\Tables\TableChitietphieunhap;
use App\Models\Tables\TableChitietphieuxuat;
use App\Models\Tables\TableDanhmucsanpham;
use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableMausac;
use App\Models\Tables\TableSanpham;
use App\Models\Tables\TableThongtinsanpham;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SanphamModel extends TableSanpham {

    protected $fillable = [
        TableSanpham::COL_ID_SP,
        TableSanpham::COL_ID_DMSP,
        TableSanpham::COL_TEN_SP,
        TableSanpham::COL_GIA_SP,
        TableSanpham::COL_SOLUONG_SP
    ];

    public function danhMucSanPham(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DanhmucsanphamModel::class,
            TableSanpham::COL_ID_DMSP, TableDanhmucsanpham::COL_ID_DMSP);
    }

    public function anhs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AnhsanphamModel::class,
            TableSanpham::COL_ID_SP, TableAnhsanpham::COL_ID_SP);
    }

    public function mauSacs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MausacModel::class,
            TableSanpham::COL_ID_SP, TableMausac::COL_ID_SP);
    }

    public function dungLuongs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DungluongModel::class,
            TableSanpham::COL_ID_SP, TableDungluong::COL_ID_SP);
    }

    public function chiTietPhieuXuats(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChitietphieuxuatModel::class,
            TableSanpham::COL_ID_SP, TableChitietphieuxuat::COL_ID_SP);
    }

    public function chiTietPhieuNhaps(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChitietphieunhapModel::class,
            TableSanpham::COL_ID_SP, TableChitietphieunhap::COL_ID_SP);
    }

    public function binhLuans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BinhluanModel::class,
            TableSanpham::COL_ID_SP, TableBinhluan::COL_ID_SP);
    }

    public function thongTinSanPhams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ThongtinsanphamModel::class,
            TableSanpham::COL_ID_SP, TableThongtinsanpham::COL_ID_SP);
    }

    protected $keyType = 'string';
    public $timestamps = false;
    use HasFactory;
}
