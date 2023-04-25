<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableKhachhang extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'khachhang';
    protected $primaryKey = 'Ma_KH';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'khachhang';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_KH = 'Ma_KH';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_KH = 'Ten_KH';

    /**
    * @type <varchar(15)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SDT_KH = 'SDT_KH';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_DIACHI_KH = 'DiaChi_KH';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_EMAIL = 'Email';

    /**
    * @type <varchar(10)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_GIOITINH_KH = 'GioiTinh_KH';

}
