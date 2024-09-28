<?php

require_once 'connect.php';
require __DIR__ . '/../../../vendor/autoload.php';


class Query
{
    private $conn;

    public function __construct()
    {
        $db = new Connect();
        $this->conn = $db->connection();
    }

    public function searchValue()
    {
        return;
    }

    public function insert()
    {
        $response = [
            'status' => 'success',
            'message' => 'Ticket successfully created.'
        ];

        $dateTime = new DateTime('now', new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone('Asia/Singapore'));
        $date = $dateTime->format("F j, Y h:i:s A");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bug_report_id = isset($_POST['bug_report_id']) ? $_POST['bug_report_id'] : null;
            $title = isset($_POST['textTitle']) ? $_POST['textTitle'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : null;

            // Sanitize input to avoid SQL injection
            $bug_report_id = $this->conn->real_escape_string($bug_report_id);
            $title = $this->conn->real_escape_string($title);
            $description = $this->conn->real_escape_string($description);

            // Use prepared statements to ensure security
            $stmt = $this->conn->prepare(
                "INSERT INTO incidents (bug_report_id, title, description, created_at) 
                 VALUES (?, ?, ?, STR_TO_DATE(?, '%M %d, %Y %h:%i:%s %p'))"
            );
            $stmt->bind_param('ssss', $bug_report_id, $title, $description, $date);

            if ($stmt->execute()) {
                // Retrieve the last inserted incident_id
                $incident_id = $stmt->insert_id;
                $bug_hotel_id = "BHT" . $incident_id; // Concatenate the "BR" prefix with the incident_id

                // Update the record with the generated bug_report_id
                $updateStmt = $this->conn->prepare(
                    "UPDATE incidents SET bug_hotel_id = ? WHERE incident_id = ?"
                );
                $updateStmt->bind_param('si', $bug_hotel_id, $incident_id);

                if ($updateStmt->execute()) {
                    // Handle file uploads
                    if (isset($_FILES['files'])) {
                        $files = $_FILES['files'];
                        $fileCount = count($files['name']);

                        for ($i = 0; $i < $fileCount; $i++) {
                            if ($files['error'][$i] == UPLOAD_ERR_OK && $files['size'][$i] <= 3 * 1024 * 1024) { // Check for upload error and size
                                $fileContent = file_get_contents($files['tmp_name'][$i]);
                                $fileStmt = $this->conn->prepare("UPDATE incidents SET attachment = ? WHERE incident_id = ?");
                                $fileStmt->bind_param('bi', $null, $incident_id);

                                // Send the binary data
                                $fileStmt->send_long_data(0, $fileContent);

                                if (!$fileStmt->execute()) {
                                    echo json_encode(['status' => 'error', 'message' => 'Failed to upload file']);
                                    return; // Exit if file upload fails
                                }
                                $fileStmt->close();
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'File error or exceeds 3MB']);
                                return; // Exit if there is an error
                            }
                        }
                        echo json_encode($response); // If all files were processed
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update bug_report_id']);
                }

                $updateStmt->close();
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert data']);
            }

            $stmt->close();
        }
    }

    public function select()
    {
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 10; // Default to 10 records per page
        $searchKey = isset($_POST['seach']) ? $_POST['search'] : null;

        $column = 'created_at';
        $ticket_filter = isset($_GET['ticket_filter']) ? $_GET['ticket_filter'] : '';

        // Get the total number of records in the database
        $totalRecordsQuery = "SELECT COUNT(*) as total FROM incidents";
        $totalRecordsResult = $this->conn->query($totalRecordsQuery);
        $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

        // Apply the filter if it's set
        $searchQuery = " ";
        if ($ticket_filter != '') {
            $searchQuery .= " AND status='" . $ticket_filter . "'";
        } else if ($ticket_filter == '') {
            $sql = "SELECT bug_report_id, title, description, status, $column
            FROM incidents 
            ORDER BY $column 
            LIMIT $start, $length";
        }

        // Get the total number of filtered records
        $filteredRecordsQuery = "SELECT COUNT(*) as total FROM incidents WHERE 1" . $searchQuery;
        $filteredRecordsResult = $this->conn->query($filteredRecordsQuery);
        $filteredRecords = $filteredRecordsResult->fetch_assoc()['total'];

        // Get the actual data for the current page
        $sql = "SELECT bug_report_id, title, description, status, $column
                FROM incidents 
                WHERE 1 " . $searchQuery . " 
                ORDER BY $column DESC
                LIMIT $start, $length";

        $result = $this->conn->query($sql);
        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                "bug_report_id" => $row['bug_report_id'],
                "title" => $row['title'],
                "description" => $row['description'],
                "status" => $row['status'],
                "created_at" => $row['created_at']
            );
        }

        // Prepare the response for DataTables
        $response = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data
        );

        // Send the JSON response
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
