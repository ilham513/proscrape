<!DOCTYPE html>
<html>
<head>
	<title>EXPLORE DANBOORU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
	.myLink {display: none}
	</style>
</head>
<body class="w3-light-grey">
	<!-- Navigation Bar -->
	<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
	  <a href="#" class="w3-bar-item w3-button w3-text-teal w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Explore</b></a>
	  <a href="#" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><i class="fa fa-search"></i></a>
	</div>
	<!-- Tabs -->
	<div class="w3-container">
		<form action="explore-go.php" method="GET">
		<h3>Travel the Danbooru with us...</h3>
		<div class="w3-container w3-row-padding" style="margin:0 -16px;">
		  <label>URL</label>
		  <input name="url" class="w3-input w3-border" type="text">
		</div>
		<p><button class="w3-button w3-teal">EXPLORE GO</button></p>
		</form>
	</div>
</body>
</html>