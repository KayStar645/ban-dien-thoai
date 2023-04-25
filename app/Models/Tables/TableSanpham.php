<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableSanpham extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'sanpham';
    protected $primaryKey = 'Ma_SP';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'sanpham';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_ID_DMSP = 'ID_DMSP';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_SP = 'Ten_SP';

    /**
    * @type <int>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_GIA_SP = 'Gia_SP';

    /**
    * @type <int>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SOLUONG_SP = 'SoLuong_SP';

}
