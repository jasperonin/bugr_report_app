<?php

require_once 'connect.php';
require __DIR__ . '/../../../vendor/autoload.php';

class Query {
    private $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->connection();
    }

    public function insert() {
        $response = [
            'status' => 'success',
            'message' => 'Data inserted successfully.'
        ];
       
        $dateTime = new DateTime('now', new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone('Asia/Singapore'));
        $date = $dateTime->format("F j, Y h:i:s A");
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bug_report_id = isset($_POST['bug_report_id']) ? $_POST['bug_report_id'] : null;
            $title = isset($_POST['textTitle']) ? $_POST['textTitle'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : null;

    
            // Debugging output
            error_log("Bug Report ID: " . print_r($bug_report_id, true));
            error_log("Title: " . print_r($title, true));
            error_log("Description: " . print_r($description, true));
    
    
            // Sanitize input to avoid SQL injection
            $bug_report_id = $this->conn->real_escape_string($bug_report_id);
            $title = $this->conn->real_escape_string($title);
            $description = $this->conn->real_escape_string($description);
    
    
            // Use prepared statements to ensure security
            $stmt = $this->conn->prepare(
                "INSERT INTO incidents (bug_report_id, title, description, created_at) VALUES (?, ?, ?, STR_TO_DATE(?, '%M %d, %Y %h:%i:%s %p'))"
            );
            $stmt->bind_param('ssss',$bug_report_id, $title, $description, $date);
    
            if ($stmt->execute()) {
                echo json_encode($response);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert data']);
            }
    
            $stmt->close();
        }
    }
    

    public function select() {
        $response = [];
        $column = 'created_at';
        $sql = "SELECT * FROM incidents ORDER BY $column";
        $result = $this->conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Query failed'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = new Query();
    $query->insert();
    
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $query = new Query();
    $query->select();
} else {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
