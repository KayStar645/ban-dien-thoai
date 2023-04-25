<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TablePhieuxuat extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'phieuxuat';
    protected $primaryKey = 'Ma_PX';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'phieuxuat';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_PX = 'Ma_PX';

    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_ID_NV = 'ID_NV';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_KH = 'Ma_KH';

    /**
    * @type <datetime>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_NGAYXUAT = 'NgayXuat';

    /**
    * @type <int>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TONGTIEN_PX = 'TongTien_PX';

    /**
    * @type <varchar(50)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TINHTRANG_PX = 'TinhTrang_PX';

}
