<?php
  $apiKey = "YOUR_API_KEY";
  $apiSecret = "YOUR_API_SECRET";
  $tokenstr = $apiKey . ":" . $apiSecret;
  $token = base64_encode($tokenstr);
  $session_id = "";

  function login() {
    $username = "beep@beep.com";
    $password = "beep";

    $data = array('email' => $username, 'password' => $password);
    $url = 'https://api.rapidsdk.com/v1/login';

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);

    $content = json_decode(curl_exec($ch), true);
    $GLOBALS['session_id'] = $content['session_id'];

    curl_close($ch);
  }

  function register() {
    $firstname = "Rapid";
    $lastname = "SDK";
    $email = "info@rapidsdk.com";
    $password = "password";

    $data = array('firstname' => $firstname, 'lastname' => $lastname,
    'email' => $email, 'password' => $password);
    $url = 'https://api.rapidsdk.com/v1/register';

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);
  }

  function create() {
    $key = "RapidSDK";
    $value = "test";

    $data = array('session_id' => $GLOBALS['session_id'], 'data' => array($key => $value));
    $url = 'https://api.rapidsdk.com/v1/data/create';

    $data = json_encode($data);

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);
  }

  function read() {
    $key = "RapidSDK";

    $data = array('session_id' => $GLOBALS['session_id'], 'data' => array($key));
    $url = 'https://api.rapidsdk.com/v1/data/read';

    $data = json_encode($data);

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);
  }

  function update() {
    $key = "RapidSDK";
    $value = "test2";

    $data = array('session_id' => $GLOBALS['session_id'], 'data' => array($key => $value));
    $url = 'https://api.rapidsdk.com/v1/data/update';

    $data = json_encode($data);

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);
  }

  function delete() {
    $key = "RapidSDK";

    $data = array('session_id' => $GLOBALS['session_id'], 'data' => array($key));
    $url = 'https://api.rapidsdk.com/v1/data/delete';

    $data = json_encode($data);

    $ch = curl_init();
    $headers[] = "Authorization: Basic " . $GLOBALS['token'];

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    echo curl_exec($ch);
  }

  login();
  register();
  create();
  read();
  update();
  delete();

?>
