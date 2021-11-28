<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>You are not authenticated</h2>
    <?php
        $host = $_SERVER['SERVER_NAME'];
        $port = $_SERVER['SERVER_PORT'];
        $params = [
            'client_id'     => $_ENV['FACEBOOK_APP_ID'],
            'redirect_uri'  => 'https://$host:$port/facebook_callback.php',
            'response_type' => 'code'
        ];
        
        $url = 'https://www.facebook.com/v12.0/dialog/oauth?' . urldecode(http_build_query($params));
        echo '<button><a href="">Login</a></button>';
    ?>
</body>
</html>