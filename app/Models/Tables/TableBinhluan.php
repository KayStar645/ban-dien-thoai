<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TableBinhluan extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'binhluan';
    protected $primaryKey = 'ID_BL';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'binhluan';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_BL = 'ID_BL';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_KH = 'Ma_KH';

    /**
    * @type <varchar(250)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_NOIDUNG = 'NoiDung';

    /**
    * @type <datetime>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_NGAY_BL = 'Ngay_BL';

}
