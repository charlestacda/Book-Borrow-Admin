<?php
require_once __DIR__ . "/config.php";

use Main as Post;

if (Post::check("GET")) {
    $Borrow = new Borrow();

    // Fetch all request records
    $requests = $Borrow->read();

    // Create an array to store book requests
    $bookRequests = array();

    // Extract book requests from request records
    foreach ($requests as $request) {
        // Use the fetched pat_id and book_id to retrieve related data
        $patronName = fetchPatronName($request['pat_id']);
        $bookTitle = fetchBookTitle($request['book_id']);

        $bookRequests[] = array(
            'pat_id' => $request['pat_id'],
            'borrower_name' => $patronName, // Use the fetched patron name here
            'book_id' => $request['book_id'],
            'title' => $bookTitle, // Use the fetched book title here
            'date_req' => $request['date_req'],
            'req_status' => $request['req_status']
        );
    }

    // Return the list of book requests including request statuses as a JSON response
    header("Content-Type: application/json");
    echo json_encode($bookRequests);
}
?>
