<?php
$allow_method = "POST";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("POST")) {
    $data = json_decode(file_get_contents("php://input"));
    if (
        !isset($data->req_id) ||
		!isset($data->remark)
    ) :
        $fields = [
            "req_id" => "Request ID",
			"remark" => "Remark",



        ];
        Response::json(0, 400, "Please fill all the required fields", "fields", $fields);

    elseif (
        empty(trim($data->req_id)) ||
		empty(trim($data->remark))


    ) :
        $fields = [];
        foreach($data as $key => $val){
            if(empty(trim($val))) array_push($fields, $key); 
        }
        Response::json(0, 400, "Oops! empty field detected.","empty_fields", $fields);

    else :
        $Status = new Status();
        $Status->create($data->req_id, $data->remark);

    endif;
}