<? include_once('../simple_html_dom.php'); ?>
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
	<?php
		//page controller
		if(!isset($_GET['p'])){$_GET['p'] = 1;}

		$url = "https://danbooru.donmai.us/explore/posts/popular?date=".date("Y-m-d",strtotime("-1 days"))."&page=".$_GET['p'];		
				
		$html = file_get_html($url);
		// echo $html;die(); //TESTTEST TEST TEST
		
		foreach($html->find('article') as $i=>$element) {
			$gambar["url"] = $element->children(0);
			$gambar["id"]= $element->getAttribute('data-id');
			
			if(strpos($element->getAttribute('data-tags'), 'animated')){
				// continue;
				$gambar["url"]= $element->getAttribute('data-preview-file-url');
			}
			
			$array_gambar[] = $gambar;
		}
		
		var_dump($array_gambar);die();
	?>
	
<?php foreach($array_gambar as $gambar): ?>
		<hr/>
		<div class="w3-card-4">
			<div class="w3-center w3-display-container">
				<!-- Konten -->
				<img id="<?= $gambar['id'] ?>" onclick="onClick(this)" class="w3-image" src="//imagex.aratech.co/?url=<?= str_replace("https://", "", $gambar['url'])?>"/>
			</div>
			<div class="w3-container">
				<hr/>
				<a style="text-decoration: none;" href="http://doujinshi18.is-best.net/imgur.php?url=<?= urlencode($gambar['url']) ?>&id=<?= $gambar['id'] ?>&p=<?= $_GET['p'] ?>"><button class="w3-btn w3-block w3-large w3-teal">GASKEUN</button></a>
				<hr/>
			</div>
		</div>
<?php endforeach; ?>

		<hr/>
		
		<a style="text-decoration: none;" href="?p=<?= $_GET['p'] + 1 ?>"><button class=" w3-xlarge w3-btn w3-block w3-blue">NEXT ></button></a>
		
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