<?php
require_once __DIR__ . "\classes\Database.php";

function getPatronIdByEmail($email) {
    try {
        $db = new Database();
        $connection = $db->getConnection();

        $sql = "SELECT pat_id FROM patron_table WHERE email = :email";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['pat_id'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        return null;
    }
}

// Check if the email parameter is provided in the query string
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $patronId = getPatronIdByEmail($email);
    // Return the patron ID as JSON
    echo json_encode(['patron_id' => $patronId]);
} else {
    echo json_encode(['error' => 'Email parameter is missing']);
}
?>
