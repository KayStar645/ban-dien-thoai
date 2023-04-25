<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TableAnhsanpham extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'anhsanpham';
    protected $primaryKey = 'ID_AnhSP';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'anhsanpham';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_ANHSP = 'ID_AnhSP';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_ANH_URL = 'Anh_URL';

}
