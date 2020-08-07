<head>
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="jumbotron">
    

<?
$dirs = array_filter(glob('*'), 'is_dir');

foreach($dirs as $dirs){
	echo '<a href="'.$dirs.'"><button class="btn btn-lg btn-primary btn-block">'.strtoupper($dirs).'</button></a><hr/>';
}

// print_r( $dirs);