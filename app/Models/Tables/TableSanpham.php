<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-26 07:17:33*/

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
    protected $primaryKey = 'ID_SP';
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
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_SP = 'ID_SP';

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
