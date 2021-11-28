<?php
    if (isset($_SESSION['ACCESS_TOKEN'])) {
        $id = $_SESSION['USER_ID'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/$id/permissions");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);

        session_destroy();

        $host = $_SERVER['SERVER_NAME'];
        header("Location: https://$host/login.php");
        exit();
    }
?>