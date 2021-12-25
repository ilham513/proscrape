<?php
include_once('../simple_html_dom.php');

$url = "https://rule34.xxx/index.php?page=post&s=list&tags=fate_%28series%29";

if(isset($_GET['p'])){
	$url = "https://rule34.xxx/index.php?page=post&s=list&tags=fate_%28series%29&pid=". $_GET['p'] * 42;
}

//// MULAI DOM
$html = file_get_html($url); #echo $html;die(); //TESTTEST TEST TEST

//PENETRAL PAGE
if(!isset($_GET['p'])){$_GET['p'] = 0;}

// MULAI DOM LOOP
foreach($html->find('span[class=thumb]') as $i=>$element) {	
	$array_link[] = $element->children(0)->href;
	$array_url[] =  $element->children(0)->children(0)->getAttribute('data-cfsrc');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fate</title>
	<meta charset="UTF-8">
	<link rel="icon" href="https://i.imgur.com/0GsEGfN.png" type="image/gif" sizes="192x192">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>

<body bgcolor="white">
	<div class="w3-center w3-padding-large w3-margin-top" id="portfolio">
	<?php foreach($array_url as $i=>$url): ?>
		<?php $callback = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
		<?php $token = base64_encode($array_link[$i]);?>
		<a href="rule34_filter.php?callback=<?=$callback?>&token=<?=$token ?>"><img src="<?= "//imagex.aratech.co/?url=" . str_replace("https://","",$url) . "&w=150&h=150&t=square" ?>"/></a>
	<?php endforeach; ?>
	</div>
	
	<hr/>
	
	<div class="w3-container">
		<a href="fate.php?p=<?= $_GET['p'] + 1 ?>"><button class="w3-button w3-block w3-large w3-teal">NEXT</button></a>
	</div>
	
	<hr/>
</body>

<!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-small w3-black w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>
  
<script>
//$("p:contains(animated)").css("background-color", "yellow");

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
</html>