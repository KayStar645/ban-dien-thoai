<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableDungluong extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'dungluong';
    protected $primaryKey = 'ID_DL';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'dungluong';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_DL = 'ID_DL';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_DL = 'Ten_DL';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

}
