<?php
$allow_method = "POST";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("POST")) {
    $data = json_decode(file_get_contents("php://input"));
    if (
        !isset($data->pat_id) ||
        !isset($data->book_id) ||
		!isset($data->date_req) ||
		!isset($data->due_req)
    ) :
        $fields = [
            "pat_id" => "Patron ID",
            "book_id" => "Book ID",
			"date_req" => "Date Request",
			"due_req" => "Due Request",

        ];
        Response::json(0, 400, "Please fill all the required fields", "fields", $fields);

    elseif (
        empty(trim($data->pat_id)) ||
        empty(trim($data->book_id)) ||
		empty(trim($data->date_req)) ||
		empty(trim($data->due_req))

    ) :
        $fields = [];
        foreach($data as $key => $val){
            if(empty(trim($val))) array_push($fields, $key); 
        }
        Response::json(0, 400, "Oops! empty field detected.","empty_fields", $fields);

    else :
        $Borrow = new Borrow();
        $Borrow->create($data->pat_id, $data->book_id, "Process", $data->date_req, $data->due_req);

    endif;
}