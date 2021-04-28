<?php
namespace DB;
class Dbconfig {

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $dbname = 'db_question';
    function Dbconfig() {
        $this -> host = 'localhost';
        $this -> user = 'root';
        $this -> pass = 'lsts@123';
        $this -> dbname = 'db_question';
    }
}