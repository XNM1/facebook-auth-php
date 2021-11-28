<?php
    if (!isset($_SESSION['ACCESS_TOKEN'])) {
        $host = $_SERVER['SERVER_NAME'];
        header("Location: https://$host/login.php", true, 302);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= '<title>Wellcome,' . $_SESSION['USER_NAME'] . '</title>'; ?>
</head>
<body>
    <?= '<img src="http://graph.facebook.com/' . $_SESSION['USER_ID'] . '/picture?width=200"/>' ?>
    <?= '<h2>Wellcome,' . $_SESSION['USER_NAME'] . '</h2>' ?>
    <button type="button"><a href="/logout.php">Logout</a></button>
</body>
</html>