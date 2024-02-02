<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "php_api";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db, 3306);

// Check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {

}
