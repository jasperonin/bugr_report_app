<?php
header('Content-Type: application/json');
require '../database/query.php';

Class API {

    private $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function handle_request() {
        $method = $_SERVER['REQUEST METHOD'];

        switch($method) {
            case 'POST':
                $this->handlePost();
                break;
            default:
                http_response_code(405);
                echo json_encode(["No method allowed"]);
                break;
        }
    }

    public function handlePost() {
        return;
    }
}