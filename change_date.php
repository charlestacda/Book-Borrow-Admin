<?php
$allow_method = "PUT";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("PUT")) {
    $data = json_decode(file_get_contents("php://input"));

    $fields = [
        "req_id" => "Request ID (Required)",
        "date_req" => "Date Requested (Optional)",
        "due_req" => "Due Date (Optional)",
    ];

    if (!isset($data->req_id) || !is_numeric($data->req_id)) {
        Response::json(0, 400, "Please provide a valid Request ID.", "fields", $fields);
    }

    // Extract date_req and due_req from data
    $date_req = isset($data->date_req) ? $data->date_req : null;
    $due_req = isset($data->due_req) ? $data->due_req : null;

    $Borrow = new Borrow();
    $Borrow->updateDates($data->req_id, $date_req, $due_req);
}

