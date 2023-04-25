<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableThongtinsanpham extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'thongtinsanpham';
    protected $primaryKey = 'ID_TTSP';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'thongtinsanpham';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_TTSP = 'ID_TTSP';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

    /**
    * @type <varchar(250)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_THONGTIN = 'ThongTin';

    /**
    * @type <varchar(250)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_MOTA_SP = 'MoTa_SP';

}