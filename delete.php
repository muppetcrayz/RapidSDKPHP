<?php
session_start();
$result = '';
$url = 'https://api.rapidsdk.com/v1/data/delete';
$data = array('session_id' => $_SESSION['session_id'], 'data' => array($_POST['key']);

$data = json_encode($data);

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
  print_r(json_encode($content));
}
else {
  print_r("Could not delete data.");
}

?>
