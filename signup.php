<?php
$result = '';
$url = 'https://api.rapidsdk.com/v1/register';

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
  $data = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'],
  'email' => $_POST['email'], 'password' => $_POST['password']);

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
    header('location:login.php');
  }
  else if ($content['status'] == "Failed"){
    print_r("Please try again.");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RapidSDK PHP Demo</title>
</head>

<body>
  <form method="POST" action="signup.php">
    <h2>Register</h2>
    <input type="text" id="firstname" name="firstname" placeholder="First Name" />
    <br />
    <input type="text" id="lastname" name="lastname" placeholder="Last Name" />
    <br />
      <input type="text" id="email" name="email" placeholder="Email"/>
      <br />
      <input type="password" id="password" name="password" placeholder="Password" />
      <br />
      <button type="submit">Sign In</button>
      <hr>
      Already have an account?<br/>
      <a href="/login.php">
        Log In
      </a>
  </form>
</body>
