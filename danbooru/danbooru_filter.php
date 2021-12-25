<?php
include_once('../simple_html_dom.php');

// var_dump($_GET);die();

#callback_q anti-null
if(!isset($_GET['callback_q'])){$_GET['callback_q'] = '';}

$html = file_get_html("https://danbooru.donmai.us/posts/".$_GET['danbooru_id']);

// echo $html;die();

#ambil image
$img_url = $html->find("img[id=image]", 0)->getAttribute('src');
// echo "<img src='".$img_url."'/>";

#ambil tag
foreach($html->find('ul[class=character-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}
foreach($html->find('ul[class=copyright-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}

#gabungin menjadi hastag
$hastag = implode(" ",$tag);

// echo "<br/>".$hastag;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Popular</title>
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
	<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">
		<div class="w3-card-4">
			<div class="w3-center w3-display-container">
				<!-- Konten -->
				<img onclick="onClick(this)" class="w3-image" src="//imagex.aratech.co/?url=<?= str_replace("https://", "",$img_url)?>"/>
			</div>
			<div class="w3-container">
				<hr/>
				<a style="text-decoration: none;" href="<?=
				"http://doujinshi18.is-best.net/go-imgur.php?img_url=".
				urlencode($img_url).
				"&hastag=".
				urlencode($hastag).
				"&id=".
				$_GET['danbooru_id'].
				"&callback_p=".
				$_GET['callback_p'].
				"&callback_id=".
				$_GET['callback_id'].
				"&callback_dir=".
				$_GET['callback_dir'].
				"&callback_q=".
				$_GET['callback_q']
				?>"><button class="w3-btn w3-block w3-large w3-teal">GASKEUN</button></a>
				<hr/>
			</div>
		</div>
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

<?php
/*
foreach($html->find('ul[class=character-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}

foreach($html->find('ul[class=copyright-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}

//jika aktor gambar kosong, buat array
if(!isset($tag)){$tag[] = '';}


foreach($html->find('picture > img') as $element){
    $url_gambar = $element->src;
}

require 'vendor/autoload.php';


\Cloudinary::config([ 
  "cloud_name" => "jbr-foundation", 
  "api_key" => "826495999593532", 
  "api_secret" => "Nh1K-Z6G-fre_EyfaJhzc0N2Vls", 
  "secure" => true]);
  
$img = \Cloudinary\Uploader::upload("$url_gambar");

#echo "http://localhost/hinata18/antre.php?url=".$img['secure_url']."&judul=".implode(" ",$tag_judul_gambar)."&aktor=".implode(" ",$tag_aktor_gambar)."&callback=".$_GET['callback'];

$url_antre = "http://hinata18.is-best.net/antre.php?url=".$img['secure_url']."&tag=".implode(" ",$tag)."&callback=".base64_encode($_GET['callback']);

header("Location: $url_antre");
die();
*/