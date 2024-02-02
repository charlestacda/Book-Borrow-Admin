<?php
$allow_method = "PUT";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("PUT")) {
    $data = json_decode(file_get_contents("php://input"));

    $fields = [
        "book_id" => "Book ID (Required)",
        "title" => "Book title (Optional)",
        "category" => "Book category (Optional)",
        "author" => "Author name (Optional)",
        "content" => "Book Description (Optional)",
        "pub_date" => "Publication Date (Optional)",
        "book_status" => "Book Status (Optional)",
        "publisher" => "Book Publisher (Optional)",
    ];

    if (!isset($data->book_id) || empty($data->book_id)) {
        Response::json(0, 400, "Please provide a valid Book ID and at least one field.", "fields", $fields);
    }

    $isEmpty = true;
    $empty_fields = [];

    foreach ((array)$data as $key => $val) {
        if (in_array($key, ["title", "category", "author", "content", "pub_date", "book_status", "publisher"])) {
            if (!empty(trim($val))) {
                $isEmpty = false;
            } else {
                array_push($empty_fields, $key);
            }
        }
    }

    if ($isEmpty) {
        $has_empty_fields = count($empty_fields);
        Response::json(0, 400,
            $has_empty_fields ? "Oops! empty field detected." : "Please provide the Book ID and at least one field.",
            $has_empty_fields ? "empty_fields" : "fields",
            $has_empty_fields ? $empty_fields : $fields);
    }

    $Post = new Post();
    $Post->update($data->book_id, $data);
}
