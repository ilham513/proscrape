<title>IMGUR UPLOAD FULL</title>

<?php
$url = urldecode($_GET['url']);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.imgur.com/3/image',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('image' => "$url"),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Client-ID b5cffa381ffa5de'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>