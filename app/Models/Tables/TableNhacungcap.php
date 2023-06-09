<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-26 07:17:33*/

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
    protected $primaryKey = 'ID_NCC';
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
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_NCC = 'ID_NCC';

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
