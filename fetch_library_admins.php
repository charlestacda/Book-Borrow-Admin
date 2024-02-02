<?php

include 'dbcon.php';

// Define an array to store the fetched data
$data = array();

$sql = "SELECT id_lib, password FROM library_admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data and add it to the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "id_lib" => $row["id_lib"],
            "password" => $row["password"]
        );
    }
}

// Close the database connection
$conn->close();

// Convert the $data array to JSON format
$dataJson = json_encode($data);

// Set the appropriate content type header for JSON
header('Content-Type: application/json');

// Output the JSON data
echo $dataJson;

?>
