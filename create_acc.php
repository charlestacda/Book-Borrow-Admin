<?php
$allow_method = "POST";
require_once __DIR__ . "/config.php";

use Main as Request;
use Main as Response;

if (Request::check("POST")) {
    if (
        !isset($_POST['pat_id']) ||
        !isset($_POST['fname']) ||
        !isset($_POST['mname']) ||
        !isset($_POST['lname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['patron_type']) ||
        !isset($_POST['course']) ||
		!isset($_POST['reg_date'])
    ) {
        $fields = [
            "fname" => "First name",
			"mname" => "Middle name",
			"lname" => "Last name",
			"email" => "Email",
			"patron_type" => "Patron Type",
			"course" => "Course",
			"reg_date" => "Registration Date",
        ];
        Response::json(0, 400, "Please fill all the required fields", "fields", $fields);
    } elseif (
        empty(trim($_POST['pat_id'])) ||
        empty(trim($_POST['fname'])) ||
        empty(trim($_POST['mname'])) ||
        empty(trim($_POST['lname'])) ||
        empty(trim($_POST['email'])) ||
        empty(trim($_POST['patron_type'])) ||
        empty(trim($_POST['course'])) ||
		empty(trim($_POST['reg_date']))
    ) {
        $fields = [];
        foreach ($_POST as $key => $val) {
            if (empty(trim($val))) {
                array_push($fields, $key);
            }
        }
        Response::json(0, 400, "Oops! empty field detected.", "empty_fields", $fields);
    } else {
        $Account = new Account();
        $result = $Account->create(
            $_POST['pat_id'],
            $_POST['fname'],
            $_POST['mname'],
            $_POST['lname'],
            $_POST['email'],
            $_POST['patron_type'],
            $_POST['course'],
			$_POST['reg_date']
        );

        if ($result['ok']) {
            // Redirect back to reading_mat.php
            header("Location: reg_acc.php");
            exit;
        } else {
            // Handle error here if needed
            // You can display an error message or perform other actions
        }
    }
}
?>
