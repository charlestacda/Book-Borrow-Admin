<?php
require_once __DIR__ . "/config.php";

use Main as Post;

if (Post::check("GET")) {
    if (isset($_GET['book_id'])) {
        $bookId = trim($_GET['book_id']);

        // Establish a database connection
        $dbHost = "your_database_host"; // Replace with your database host
        $dbUsername = "your_database_username"; // Replace with your database username
        $dbPassword = "your_database_password"; // Replace with your database password
        $dbName = "your_database_name"; // Replace with your database name

        $yourDatabaseConnection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($yourDatabaseConnection->connect_error) {
            die("Database connection failed: " . $yourDatabaseConnection->connect_error);
        }

        // Implement your database query logic here
        $query = "SELECT COUNT(*) AS count FROM request_table WHERE book_id = '$bookId'";
        $result = $yourDatabaseConnection->query($query);
        $row = $result->fetch_assoc();
        $isBorrowed = ($row['count'] > 0);

        Response::json(1, 200, null, "is_borrowed", $isBorrowed);
        
        // Close the database connection
        $yourDatabaseConnection->close();
    } else {
        Response::_404(); // Book ID not provided
    }
}
?>
