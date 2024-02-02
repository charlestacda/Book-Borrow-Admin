<?php

include 'dbcon.php';

if (isset($_POST["login"])) {
    $userID = $_POST['loginID'];
    $password = $_POST['loginPass'];
    $loginOk = false;

    $sql = "SELECT id_lib, password FROM library_admin"; //SQL QUERY FOR DISPLAY RECORDS
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $user = $row['id_lib'];
        $storedPassword = $row['password'];

        if ($userID == $user && $password == $storedPassword) {
            $loginOk = true;
            break;
        }
    }

    if ($loginOk) {
        ?>
        <script>
            alert('Login successful.');
            window.location = "index.php<?php echo '?$id_emp=' . $username;?>";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('User ID and Password did not match. Please try again.');
            window.location = "login.php";
        </script>
        <?php
    }
}

?>
