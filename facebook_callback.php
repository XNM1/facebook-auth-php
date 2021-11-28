<?php
$host = $_SERVER['SERVER_NAME'];
if (isset($_GET['code'])) {
	$params = [
		'client_id'     => $_ENV['FACEBOOK_APP_ID'],
		'client_secret' => $_ENV['FACEBOOK_APP_SECRET'],
		'redirect_uri'  => "https://$host/facebook_callback.php",
		'code'          => $_GET['code']
    ];
    $data = file_get_contents('https://graph.facebook.com/v12.0/oauth/access_token?' . urldecode(http_build_query($params)));
	$data = json_decode($data, true);
	if (isset($data['access_token'])) {
		$params = [
			'access_token' => $data['access_token'],
			'fields'       => 'id,first_name,last_name'
        ];
		$info = file_get_contents('https://graph.facebook.com/me?' . urldecode(http_build_query($params)));
		$info = json_decode($info, true);

		session_start();
        $_SESSION['ACCESS_TOKEN'] = $data['access_token'];
        $_SESSION['USER_NAME'] = $info['first_name'] . ' ' . $info['last_name'];
        $_SESSION['USER_ID'] = $info['id'];
		echo $_SESSION['USER_NAME'];
        // header("Location: https://$host/index.php");
        // exit();
	}
}
else {
    header("Location: https://$host/login.php");
    exit();
}