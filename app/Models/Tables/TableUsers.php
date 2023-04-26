<?php
/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : 2023-04-26 07:17:33*/

namespace App\Models\Tables;


use Illuminate\Database\Eloquent\Model;

class TableUsers extends Model
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
    protected $table = 'users';
    protected $primaryKey = 'id';

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = 'users';


    /**
    * @type <bigint unsigned>
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
    const COL_NAME = 'name';

    /**
    * @type <varchar(255)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_EMAIL = 'email';

    /**
    * @type <timestamp>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_EMAIL_VERIFIED_AT = 'email_verified_at';

    /**
    * @type <varchar(255)>
    * @null <NO>
    * @default <>
    * @extra <>
    */
    const COL_PASSWORD = 'password';

    /**
    * @type <varchar(100)>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_REMEMBER_TOKEN = 'remember_token';

    /**
    * @type <timestamp>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_CREATED_AT = 'created_at';

    /**
    * @type <timestamp>
    * @null <YES>
    * @default <>
    * @extra <>
    */
    const COL_UPDATED_AT = 'updated_at';

}
