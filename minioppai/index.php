<? include_once('simple_html_dom.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Minioppai Proscrape</title>
<meta charset="UTF-8">
<link rel="icon" href="https://i.imgur.com/0GsEGfN.png" type="image/gif" sizes="192x192">
</head>


<body bgcolor="white">

<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">

	<?
		$url = "https://minioppai.org/";
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			if(substr($url,0,13) == 'https://drive'){
				header("Location: $url");
				die();
			}
		}
		
		//// MULAI DOM
		$html = file_get_html($url);
		
		//remove iklan
		foreach($html ->find('#floatcenter') as $item) {
			$item->outertext = '';
		}

		//remove script
		foreach($html ->find('script') as $item) {
			$item->outertext = '';
		}
		
		//anti lazyload
		foreach($html->find('img') as $element) {
			$element->src = $element->getAttribute('data-src');
		}


		foreach($html ->find('a') as $item) {
			$item->href = 'index.php?url='.$item->href;
		}

		echo( $html );die(); //TESTTEST TEST TEST