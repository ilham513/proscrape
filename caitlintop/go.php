<?php

$url = $_GET['url'];

$url_path = explode("/",$url);

$dot = end($url_path);
$dot = substr($dot,1);

array_shift($url_path);
array_shift($url_path);
array_pop($url_path);

// echo '<pre>'; var_dump ($url_path);

$clean_url = "//".implode("/",$url_path)."/";

// echo $clean_url."<br/>";
// echo $dot."<br/>";

#page setup
if(!isset($_GET['p'])){$_GET['p'] = 1;}
// echo $_GET['p'];die();

$p = $_GET['p'];
$z = $p+10;

// for ($i = $p; $i < $z; $i++) {
  // echo $clean_url.$i.$dot."<br>";
// }

// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Caitlintop</title>
	<meta charset="UTF-8">
	<link rel="icon" href="https://i.imgur.com/0GsEGfN.png" type="image/gif" sizes="192x192">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>

<body>

	<div class="w3-container w3-center">
		<?php for($i = $p; $i < $z; $i++): ?>
			<img width="40%" src="<?= $clean_url.$i.$dot ?>"/><br/>
		<?php endfor; ?>

		<hr/>

		<a href="?url=<?=$_GET['url']?>&p=<?=$z?>"><button class="w3-button w3-xlarge w3-block w3-teal">Next</button></a>
		
		<hr/>
	</div>
	
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
