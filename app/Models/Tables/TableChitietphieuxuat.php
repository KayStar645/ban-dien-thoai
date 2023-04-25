<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableChitietphieuxuat extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
//    use HasCompositePrimaryKeyTrait;

    public $incrementing = false;
    protected $table = 'chitietphieuxuat';
    protected $primaryKey = ['Ma_PX', 'Ma_SP'];
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'chitietphieuxuat';


    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_PX = 'Ma_PX';

    /**
    * @type <varchar(15)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MA_SP = 'Ma_SP';

    /**
    * @type <int>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SOLUONGXUAT = 'SoLuongXuat';

}
