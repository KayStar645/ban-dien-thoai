<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-26 07:17:33*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TableCuahang extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'cuahang';
    protected $primaryKey = 'Ten_CH';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'cuahang';


    /**
    * @type <varchar(100)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_TEN_CH = 'Ten_CH';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TAIKHOAN = 'TaiKhoan';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_MATKHAU = 'MatKhau';

    /**
    * @type <varchar(150)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_DIACHI_CH = 'DiaChi_CH';

    /**
    * @type <varchar(15)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SDT_CH = 'SDT_CH';

}
