<?php
require './backend/controller/database/connect.php';
require __DIR__ . '/../../../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

Class Query {

    private $conn;

    public function __construct()
    {   
        $db = new Connect();
        $this->conn = $db->connection();
    }

    public function insert(){ 
        $uuid = Uuid::uuid4();
        $dateTime = new DateTime('now', new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone('Asia/Singapore'));
        $date = $dateTime->format("F j, Y h:i:s A");
       
        $sql = "INSERT INTO context (id, email, label,bug_report_num, description, created_at) VALUES ('$uuid', 'email@email.com', 'sample', 'BR2004995', 'test', STR_TO_DATE('$date', '%M %d, %Y %h:%i:%i %p'))";

        if(mysqli_query($this->conn,$sql) == TRUE) {
            echo 'Record inserted';
        }  
    }

    public function select() {
        $column =  'created_at';
        $sql = "SELECT * FROM context ORDER BY $column ASC LIMIT 10 ";
        $result = $this->conn->query($sql);
        return $result;
    }
}