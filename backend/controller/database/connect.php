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
            die(json_encode(['status' => 'error', 'message' => 'Unable to connect to database: ' . $this->conn->connect_error]));
        }
        return $this->conn;
    }

}