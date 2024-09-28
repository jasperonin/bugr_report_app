<?php

require_once 'connect.php';
require __DIR__ . '/../../../vendor/autoload.php';


class LiveSearch
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

    public function live_search()
    {
        $search = $this->conn->real_escape_string($_GET['query']);
        $query = "SELECT incident_id, title, bug_hotel_id, attachment FROM incidents WHERE title LIKE '%$search%' OR bug_report_id LIKE '%$search%'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p> Incident ID: " . $row['incident_id'] . "</p>";
                echo "<p> Bug Hotel ID: " . $row['bug_hotel_id'] . "</p>";
                echo "<p> Title: " . $row['title'] . "</p>";

                // Check if there's an attachment
                if (!empty($row['attachment'])) {
                    $fileContent = $row['attachment'];

                    // Use finfo to get the MIME type of the attachment
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $mimeType = $finfo->buffer($fileContent);

                    $encodedFile = base64_encode($fileContent); // Encode the file content in base64

                    // Display based on MIME type
                    if (strpos($mimeType, 'image') !== false) {
                        // If the attachment is an image, display it
                        echo "<p>Attachment:</p><img src='data:$mimeType;base64,$encodedFile' alt='Attachment' style='max-width:300px;' />";
                    } elseif ($mimeType == 'application/pdf') {
                        // If the attachment is a PDF, embed it
                        echo "<p>Attachment:</p><embed src='data:$mimeType;base64,$encodedFile' type='application/pdf' width='300' height='400' />";
                    } else {
                        // For other file types, provide a download link
                        echo "<p>Attachment:</p><a href='data:$mimeType;base64,$encodedFile' download='attachment'>Download File</a>";
                    }
                } else {
                    echo "<p>No attachment available.</p>";
                }
            }
        } else {
            echo "No records found!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $liveSearch = new LiveSearch();
    $liveSearch->live_search();
} else {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
