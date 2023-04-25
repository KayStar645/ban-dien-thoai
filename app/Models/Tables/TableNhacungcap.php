<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableNhacungcap extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'nhacungcap';
    protected $primaryKey = 'Ma_NCC';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'nhacungcap';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_NCC = 'Ma_NCC';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_NCC = 'Ten_NCC';

    /**
    * @type <varchar(15)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SDT_NCC = 'SDT_NCC';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_DIACHI_NCC = 'DiaChi_NCC';

}
