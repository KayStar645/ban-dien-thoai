<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-25 02:32:46*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableMigrations extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'migrations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'migrations';


    /**
    * @type <int unsigned>
    * @null <NO>
    * @default <>
    * @extra <auto_increment>
    */
    const COL_ID = 'id';

    /**
    * @type <varchar(255)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_MIGRATION = 'migration';

    /**
    * @type <int>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_BATCH = 'batch';

}
