<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-26 07:17:33*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TableDanhmucsanpham extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'ID_DMSP';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'danhmucsanpham';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_DMSP = 'ID_DMSP';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_DM = 'Ten_DM';

}
