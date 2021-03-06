<? include_once('../simple_html_dom.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Danbooru GO</title>
<meta charset="UTF-8">
<link rel="icon" href="https://i.imgur.com/0GsEGfN.png" type="image/gif" sizes="192x192">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>


<body bgcolor="white">

<ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>GO</li>
</ul>


<center>
<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">

	    <?
			$url = $_GET['url'];
			$html = file_get_html($url);
			
			//filter gambar
			$gambar_post = $html->find('img', 0)->src; 
			$gambar_post_filter = 'https://imagex.aratech.co/?url='	.	str_replace	(	array("https://","http://")	,	""	,	$gambar_post	);
			echo '<img class="w3-image" src="'.	$gambar_post_filter	.'"/>';
			
			//filter list tag
			$list_tag = $html->find('ul[class=general-tag-list]', 0);
			echo $list_tag;


			//filter list artist
			$list_artis = $html->find('ul[class=artist-tag-list]', 0);
			echo $list_artis;


			//komentar artist
			$komentar_artis = $html->find('div[id=artist-commentary]', 0);
			echo "<div class='w3-panel w3-pale-green'>".$komentar_artis."</div>";