<?php

require __DIR__ . '/../../../vendor/autoload.php';
use Dotenv\Dotenv;

class Connect {

    public $host;
    public $user;
    public $password;
    public $database;
    public $conn;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this -> database = $_ENV['DATABASE'];
        $this -> host =  $_ENV['HOST'];
        $this -> user = $_ENV['MYSQL_USER'];
        $this -> password = $_ENV['PASSWORD'];
    }

    public function connection()
    {
         $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

         if($this->conn->connect_error) {
            die('Unable to connect to database');
         } else {
            echo "connection success ";
         }

        $sql_insert = "INSERT INTO test(test1) VALUES (1)";
        if(mysqli_query($this->conn,$sql_insert) == TRUE) {
            echo "Record Inserted";
        }
        return $this->conn;
    }

}