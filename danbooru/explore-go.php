<?php
include_once('../simple_html_dom.php');

//url
$url = "https://danbooru.donmai.us/posts?page=3&tags=saenai_heroine_no_sodatekata+";

//ambil query
$qry = (parse_url($url, PHP_URL_QUERY));
//parse string
parse_str($qry, $output);
//output
#var_dump($output);

//html
$html = file_get_html($url);

// MULAI DOM LOOP
foreach($html->find('article') as $i=>$element) {
	$rows[] = $element->getAttribute('data-preview-file-url');
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
				<?= "\t <img id='".$i."' class='w3-image' src='https://imagex.aratech.co/?url=".str_replace("https://","",$row)."&w=130&h=130&t=square'/> \n\t" ?>
			</div>
			<?php if($rowCount % $numOfCols == 0){echo '</div>'."\n";} ?>
		<?php endforeach; ?>
		<hr/>
		<button class="w3-button w3-block w3-teal w3-large">NEXT</button>
		<hr/>
	</div>
</body>
</html>       