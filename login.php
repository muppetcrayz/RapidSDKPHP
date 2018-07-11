<?php
session_start();
$result = '';
$url = 'https://api.rapidsdk.com/v1/login';
$data = array('username' => $_POST['username'], 'password' => $_POST['password']);

$apiKey = "4abc7598e1f28e394d57f50396c92a160671b575776ed10d885281eb94db7259";
$apiSecret = "eb1f101fe943b41526ae1c5e54089834badbab836e87f73ee1b6047e30a41c68";
$tokenstr = $apiKey . ":" . $apiSecret;
$token = base64_encode($tokenstr);

$_SESSION['token'] = $token;

$ch = curl_init();
$headers[] = "Authorization: Basic " . $_SESSION['token'];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = json_decode(curl_exec($ch), true);


if ($content['status'] == "Success") {
  $_SESSION['session_id'] = $content['session_id'];
  header('location:data.php');
}
else if ($content['status'] == "Failed"){
  print_r("Incorrect username or password.");
}

curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RapidSDK PHP Demo</title>
</head>

<body>
  <form method="POST" action="login.php">
    <h2>Log In</h2>
      <input type="text" id="username" name="username" placeholder="Email" autofocus />
      <br />
      <input type="password" id="password" name="password" placeholder="Password" />
      <br />
      <button type="submit">Sign In</button>
      <hr>
      Don't have an account yet?<br/>
      <a href="/signup.php">
        Create an account
      </a>
  </form>
</body>
</html>
