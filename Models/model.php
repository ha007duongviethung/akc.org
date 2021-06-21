<?php
require_once "./partials/database.php";
require_once "./Models/PetsModel.php";

class Models extends DATABASE
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    public function connect($table, $job, $arr)
    {
        $table = ucfirst($table).'Model';
        $job = lcfirst($job);
        $this->table = new $table;
        $this->table->$job($arr, $this->conn);
    }
}