<?php
include_once('../simple_html_dom.php');


// //ambil query
// $qry = (parse_url($_GET['url'], PHP_URL_QUERY));
// //parse string
// parse_str($qry, $output);
// //output
// var_dump($output);


//url
if(!isset($_GET['p'])){$_GET['p']=1;}
$_GET['url'] = preg_replace('/\s+/', '', $_GET['url']);
$url = $_GET['url']."&page=".$_GET['p'];
// echo($url);

//html
$html = file_get_html($url);

// MULAI DOM LOOP
foreach($html->find('article') as $i=>$element) {
	$row["url"] = $element->getAttribute('data-large-file-url');
	
	if(strpos($element->getAttribute('data-tags'), 'animated')){
		// continue;
		$row["url"]= $element->getAttribute('data-preview-file-url');
	}	
	
	$row["id"] = preg_replace('/[^0-9]/', '', $element->getAttribute('id'));
	
	$rows[] = $row;
}

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 2;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>


<!DOCTYPE html>
<html>
	<title>EXPLORE URL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="w3-container w3-margin">
		<?php foreach($rows as $i=>$row): ?>
			<?php if($rowCount % $numOfCols == 0){echo '<div class="w3-row w3-center">'."\n";} ?>
			<?php $rowCount++; ?>
			<div class="w3-col w3-card w3-container s<?= $bootstrapColWidth ?>">
				<a href="http://doujinshi18.is-best.net/imgur.php?url=<?= urlencode($row['url']) ?>&id=<?= $row['id'] ?>&p=<?= $_GET['p'] ?>&callback=<?= $_GET['url'] ?>">
					<img id="<?= $row["id"] ?>" class="w3-image" src="https://imagex.aratech.co/?url=<?= str_replace("https://","",$row["url"]) ?>&w=800&h=800&t=square"/>
				</a>
			</div>
			<?php if($rowCount % $numOfCols == 0){echo '</div>'."\n";} ?>
		<?php endforeach; ?>
		<hr/><br/>
		<a href="?p=<?= $_GET['p'] + 1 ?>&url=<?=$_GET['url']?>"><button class="w3-button w3-block w3-teal w3-large">NEXT</button></a>
		<hr/>
	</div>
</body>
</html>       