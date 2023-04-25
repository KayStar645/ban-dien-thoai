<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class TableNhanvien extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'nhanvien';
    protected $primaryKey = 'ID_NV';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'nhanvien';


    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID_NV = 'ID_NV';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_TEN_NV = 'Ten_NV';

    /**
    * @type <varchar(15)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_SDT_NV = 'SDT_NV';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_DIACHI_NV = 'DiaChi_NV';

    /**
    * @type <varchar(10)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_GIOITINH_NV = 'GioiTinh_NV';

    /**
    * @type <datetime>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_NGAYSINH = 'NgaySinh';

    /**
    * @type <varchar(100)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_TEN_CH = 'Ten_CH';

}
