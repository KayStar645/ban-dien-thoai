<?php

namespace App\Console\Commands;

use App\Helpers\FunctionFolder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ModelGenerate extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'HIN:ModelGenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Model file';

    /**
     * @var string
     */
    private $_db_path;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_db_path = app_path() . '/Models/Tables/';
        if ( ! is_dir($this->_db_path))
        {
            mkdir($this->_db_path);
        }

    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->_cleanUpModels();

        $arrTable = DB::select('Show tables');
        foreach ($arrTable as $item)
        {
            foreach ($item as $tableName)
            {
                $arr_name = explode("_", $tableName);
                $className = "Table";
                foreach ($arr_name as $name)
                {
                    $className .= ucfirst($name);
                }

                $data = [
                    "timeStamp" => date("Y-m-d H:i:s"),
                    "className" => $className,
                    "tableName" => $tableName,
                    "arrColumn" => DB::select("DESCRIBE " . $tableName)
                ];

                $primaryKey = [];
                $timestamp = FALSE;
                $softDelete = FALSE;
                foreach ($data["arrColumn"] as $col)
                {
                    if ($col->Key == "PRI")
                    {
                        $primaryKey[] = $col->Field;
                    }
                    if (in_array($col->Field, ["created_at", "updated_at"]))
                    {
                        $timestamp = TRUE;
                    }
                    if (in_array($col->Field, ["deleted_at"]))
                    {
                        $softDelete = TRUE;
                    }
                }
                $data["primaryKey"] = $primaryKey;
                $data["timestamp"] = $timestamp;
                $data["softDelete"] = $softDelete;

                $pathClass = $this->_db_path . $className . '.php';
                file_put_contents(
                    $pathClass,
                    view('command.modelGenerate', $data)->toHtml()
                );

                echo 'Generating Model for [' . $tableName . '] table...' . PHP_EOL;
                echo $pathClass;
                echo PHP_EOL . PHP_EOL;
            }
        }
        $this->_resetBatch();

        exit;
    }

    private function _cleanUpModels()
    {
        $arrDir = scandir($this->_db_path);
        foreach ($arrDir as $dir)
        {
            if (in_array($dir, array('.', '..')))
            {
                continue;
            }
            FunctionFolder::removePath($this->_db_path . '/' . $dir);
        }
    }

    private function _resetBatch()
    {
        DB::table('migrations')->update(['batch' => DB::raw('id')]);
        echo 'Migrations batch have been reset!' . PHP_EOL;
    }


}
