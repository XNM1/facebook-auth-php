<?php
    session_start();
    if (isset($_SESSION['ACCESS_TOKEN'])) {
        session_destroy();

        $host = $_SERVER['SERVER_NAME'];
        header("Location: https://$host/login.php");
        exit();
    }
?>