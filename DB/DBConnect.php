<?php

namespace DB;

use DB\Dbconfig;
use \PDO;

class DBConnect extends Dbconfig
{
    protected $host;
    protected $user;
    protected $pass;
    protected $dbname;
    public $connectString;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'lsts_2021_sandbox';
        $this->connectString = $this->connectDB();
    }

    function connectDB()
    {

        $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->user, $this->pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
    function fetchAll($table, $select = "*", $where = "")
    {

        if ($where == "") {
            $sql = "SELECT $select FROM $table";
        } else {
            $sql = "SELECT $select FROM $table WHERE $where";
        }

        $stmt = $this->connectString->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertDB($table_name, $cols, $values)
    {

        $sql = "INSERT INTO {$table_name} ({$cols}) VALUES ({$values})";

        $stmt = $this->connectString->prepare($sql);

        return  $stmt->execute();
    }
    public function updateDB($table_name, $array_cols, $where =  null)
    {
        $sql = "UPDATE {$table_name}  SET ";
        foreach ($array_cols as $key => $value) {
            $sql .= "{$key} = '{$value}',";
        }
        $sql = rtrim($sql, ',');
        if ($where != null)
            $sql .= " WHERE {$where}";


        return $this->connectString->exec($sql);
    }
    public function excuteSql($sql)
    {
        return $this->connectString->exec($sql);
    }
    public function createTable($table_name, $array_cols)
    {
        $value_sql = "";
        $key_sql = "";
        foreach ($array_cols as $key => $value) {
            $key_sql .= "{$key} VARCHAR(150),";
        }
        $value_sql = rtrim($value_sql, ",");
        $key_sql = rtrim($key_sql, ",");
        $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         {$key_sql}) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;";

        return $this->connectString->exec($sql);
    }
    public function validate($errors, $indispensable)
    {
        $array = [];
        for ($i = 0; $i < count($errors); $i++) {
            for ($j = 0; $j < count($indispensable); $j++) {
                if ($errors[$i] == $indispensable[$j]) {
                    $array[] = $indispensable[$j];
                }
            }
        }
        return $array;
    }
}
