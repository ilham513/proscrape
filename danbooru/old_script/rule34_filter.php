<?php
require 'vendor/autoload.php';
include_once('../simple_html_dom.php');


$url = "https://rule34.xxx/".base64_decode($_GET['token']);

//// MULAI DOM
$opts = array(
  'http'=>array(
    'header'=>"User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X; en-us) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53\r\n"
  )
);

$context = stream_context_create($opts);
$html = file_get_html($url , false, $context);

// echo $html;die();

$url = $html->find('img', 0)->getAttribute('data-cfsrc');

\Cloudinary::config([ 
  "cloud_name" => "jbr-foundation", 
  "api_key" => "826495999593532", 
  "api_secret" => "Nh1K-Z6G-fre_EyfaJhzc0N2Vls", 
  "secure" => true]);
  
$img = \Cloudinary\Uploader::upload("$url");



foreach($html->find('li[class=tag-type-copyright tag] > a') as $i=>$element) {	
	$hastag[] = str_replace(" ","_",$element->plaintext);
}

foreach($html->find('li[class=tag-type-character tag] > a') as $i=>$element) {	
	$hastag[] = str_replace(" ","_",$element->plaintext);
}

//filter hastag dan callback
$hastag = implode(" ",$hastag);
$hastag = urlencode($hastag);
$callback = base64_encode($_GET['callback']);
#var_dump($hastag);die();
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-center">
	<img onclick="onClick(this)" src="<?= $img['secure_url'] ?>" class="w3-image w3-margin-top" loading="lazy" width="100%">
	
	<div class="w3-container">
		<hr/>
		<div class="w3-cursive">
		  <a href="http://hinata18.is-best.net/antre.php?url=<?=$img['secure_url']?>&tag=<?=$hastag?>&callback=<?=$callback?>"><button class="w3-button w3-block w3-teal w3-large"><i class="fas fa-heart"></i> Gaskeun</button></a>
		</div>
		<hr/>
	</div>
</div>