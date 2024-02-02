<?php
require_once __DIR__ . "/config.php";

use Main as Request;

if (Request::check("GET")) {
    $Status = new Status();

    if (isset($_GET['table'])) {
        $table = $_GET['table'];
        
        if ($table === 'approved') {
            $remarks = ['Pending', 'Borrowed', 'Returned', 'Overdue'];
        } elseif ($table === 'declined') {
            $remarks = ['Declined'];
        } else {
            // Handle invalid table parameter
            Main::_400("Invalid table parameter.");
        }
		
		
        
        $posts = $Status->readByRemarks($remarks);

        // Return the filtered posts
        Main::json(1, 200, null, "posts", $posts);
    }
}
?>

