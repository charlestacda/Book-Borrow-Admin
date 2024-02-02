<?php
require_once __DIR__ . "/config.php";

use Main as Post;

if (Post::check("GET")) {
    $Borrow = new Borrow();

    // Get the specified book_id from the URL query parameters
    $bookId = isset($_GET['book_id']) ? $_GET['book_id'] : null;

    if ($bookId !== null) {
        // Fetch the most recent request record for the specified book_id
        $request = $Borrow->getMostRecentReqStatusByBookId($bookId);

        if ($request !== null) {
            // Return the most recent req_status for the specified book_id as a JSON response
            $response = array(
                'book_id' => $bookId,
                'most_recent_req_status' => $request
            );
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            // No request found for the specified book_id
            header("Content-Type: application/json");
            echo json_encode(array('error' => 'Request not found for the specified book_id'));
        }
    } else {
        // Fetch all request records
        $requests = $Borrow->read();

        $bookRequests = array(); // Create an array to store book requests

        // Extract book requests from request records
        foreach ($requests as $request) {
            $bookRequests[] = array(
                'book_id' => $request['book_id'],
                'req_status' => $request['req_status']
            );
        }

        // Return the list of book requests including request statuses as a JSON response
        header("Content-Type: application/json");
        echo json_encode(array("requests" => $bookRequests));
    }
}
?>