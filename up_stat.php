<?php
$allow_method = "PUT";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("PUT")) {
    $data = json_decode(file_get_contents("php://input"));

    $fields = [
        "borr_id" => "Borrow ID (Required)",
        "remark" => "Remark (Required)", 
    ];


    // Check if "borr_id" is not set or is not a valid numeric value
    if (!isset($data->borr_id) || !is_numeric($data->borr_id)) {
        Response::json(0, 400, "Please provide a valid Borrow ID.", "fields", $fields);
    }

    // Check if "remark" is not set or is empty
    if (!isset($data->remark) || empty(trim($data->remark))) {
        Response::json(0, 400, "Please provide a Remark.", "fields", $fields);
    }

    $Status = new Status();
    $Status->update($data->borr_id, $data);
}
