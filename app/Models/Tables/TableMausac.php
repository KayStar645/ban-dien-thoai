<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableMausac extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'mausac';
    protected $primaryKey = 'ID_Mau';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'mausac';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_MAU = 'ID_Mau';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TENMAU = 'TenMau';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

}
