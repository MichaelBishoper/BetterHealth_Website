<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "betterhealth";

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    ?>
