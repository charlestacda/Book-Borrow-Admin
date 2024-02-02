<?php
$allow_method = "POST";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("POST")) {
    if (
        !isset($_POST['book_id']) ||
        !isset($_POST['title']) ||
        !isset($_POST['category']) ||
        !isset($_POST['author']) ||
        !isset($_POST['created_at']) ||
        !isset($_POST['content']) ||
        !isset($_POST['pub_date']) ||
        !isset($_POST['publisher'])
    ) {
        $fields = [
            "title" => "Book title",
            "category" => "Book category",
            "author" => "Author name",
            "content" => "Book Description",
            "pub_date" => "Publication Date",
            "book_status" => "Book Status",
        ];
        Response::json(0, 400, "Please fill all the required fields", "fields", $fields);
    } elseif (
        empty(trim($_POST['book_id'])) ||
        empty(trim($_POST['title'])) ||
        empty(trim($_POST['category'])) ||
        empty(trim($_POST['author'])) ||
        empty(trim($_POST['created_at'])) ||
        empty(trim($_POST['content'])) ||
        empty(trim($_POST['pub_date'])) ||
        empty(trim($_POST['publisher']))
    ) {
        $fields = [];
        foreach ($_POST as $key => $val) {
            if (empty(trim($val))) {
                array_push($fields, $key);
            }
        }
        Response::json(0, 400, "Oops! empty field detected.", "empty_fields", $fields);
    } else {
        $Post = new Post();
        $result = $Post->create(
            $_POST['book_id'],
            $_POST['title'],
            $_POST['category'],
            $_POST['author'],
            $_POST['created_at'],
            $_POST['content'],
            $_POST['pub_date'],
            $_POST['publisher']
        );

        if ($result['ok']) {
            // Redirect back to reading_mat.php
            header("Location: reading_mat.php");
            exit;
        } else {
            // Handle error here if needed
            // You can display an error message or perform other actions
        }
    }
}
?>
