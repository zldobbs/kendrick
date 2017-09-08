<?php
    sleep(3);
    require "template/info.php";

    $email = $_GET['email'];
    $query = "SELECT * FROM authentication WHERE email=?";
    if (!$ps->prepare($query)) {
        die('Failed to prepare login query');
    }
    $ps->bind_param("s", $email);
    $ps->execute();

    $result = $ps->get_result();
    if ($result->num_rows == 0) {
        $mysqli->close();
        echo '<p class="text-danger">Invalid Email Address</p>';
    } 
    else {
        $row = $result->fetch_array(MYSQLI_NUM);
        echo '<p class="text-success">Your password is ' . $row[1] . '</p>';
        $ps->close();
        $mysqli->close();
    }
?>