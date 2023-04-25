<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TablePhieunhap extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'phieunhap';
    protected $primaryKey = 'Ma_PN';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'phieunhap';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_PN = 'Ma_PN';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_NCC = 'Ma_NCC';

    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_ID_NV = 'ID_NV';

    /**
    * @type <datetime>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_NGAYNHAP = 'NgayNhap';

    /**
    * @type <int>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TONGTIEN_PN = 'TongTien_PN';

    /**
    * @type <varchar(50)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TINHTRANG_PN = 'TinhTrang_PN';

}
