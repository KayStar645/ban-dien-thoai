<?php echo '<?php'; ?>

/**
* This class is generated automatically. !!! Do not touch or modify
* Last modified : <?php echo $timeStamp; ?>
*/

namespace App\Models\Tables;

use App\Models\BaseModel;
<?php if(count($primaryKey) > 1){ ?>
use App\Models\HasCompositePrimaryKeyTrait;
<?php } ?>
<?php if(!empty($softDelete)){ ?>
use Illuminate\Database\Eloquent\SoftDeletes;
<?php } ?>

class <?php echo $className; ?> extends BaseModel
{
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    */
<?php if(!empty($softDelete)){ ?>
    use SoftDeletes;
<?php } ?>
<?php if(count($primaryKey) > 1){ ?>
//    use HasCompositePrimaryKeyTrait;

    public $incrementing = false;
<?php } ?>
    protected $table = '<?php echo $tableName; ?>';
<?php if(count($primaryKey) > 1){ ?>
<?php $pre=$pri_list='';foreach ($primaryKey as $key){ $pri_list .= $pre."'".$key."'";$pre = ', '; } ?>
    protected $primaryKey = [<?= $pri_list ?>];
<?php }else{ ?>
    protected $primaryKey = '<?= current($primaryKey) ?>';
<?php } ?>
<?php if(empty($timestamp)){ ?>
    public $timestamps = false;
<?php } ?>

    /*
    |--------------------------------------------------------------------------
    | CONST
    |--------------------------------------------------------------------------
    */

    /**
    * @type <string>
    */
    const _tableName = '<?php echo $tableName; ?>';

<?php foreach($arrColumn as $column) { ?>

    /**
    * @type <<?php echo $column->{'Type'}; ?>>
    * @null <<?php echo $column->{'Null'}; ?>>
    * @default <<?php echo $column->{'Default'}; ?>>
    * @extra <<?php echo $column->{'Extra'}; ?>>
    */
    const COL_<?php echo strtoupper($column->{'Field'}); ?> = '<?php echo $column->{'Field'}; ?>';
<?php } ?>

}
