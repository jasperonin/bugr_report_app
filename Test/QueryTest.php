<?php

use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase {
    protected $controller;

    public function setUp(): void {
        $this->controller = new Query();  // This will use the class loaded by Composer
    }

    public function testSelect(): void {
        $_GET['draw'] = 1;
        $_GET['start'] = 0;
        $_GET['length'] = 5;
        $_GET['ticket_filter'] = '';

        // Capture the output of the select method
        ob_start();
        $this->controller->select();
        $output = ob_get_clean();

        // Decode the JSON output
        $data = json_decode($output, true);

        // Assert the JSON structure
        $this->assertArrayHasKey('draw', $data);
        $this->assertArrayHasKey('recordsTotal', $data);
        $this->assertArrayHasKey('recordsFiltered', $data);
        $this->assertArrayHasKey('data', $data);

        // Assert the data is an array and has the expected length
        $this->assertIsArray($data['data']);
        $this->assertCount(5, $data['data']); // assuming you expect 10 records per page

        // Further assertions can be done on the data structure
        foreach ($data['data'] as $item) {
            $this->assertArrayHasKey('bug_report_id', $item);
            $this->assertArrayHasKey('title', $item);
            $this->assertArrayHasKey('description', $item);
            $this->assertArrayHasKey('status', $item);
        }
    }
}
