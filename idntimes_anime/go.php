<? error_reporting(E_ERROR);//DISABLE ERROR
$url = $_GET['url'];
// echo $url;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

## TO ALL ##
//no-script
foreach($html->find('script') as $element) {
	$element->outertext = '';
}

## TO TARGET ##

//main & title//
$main = $html->find('article', 0);
$title = $html->find('title', 0)->plaintext;


//remove editorpick
$main->find('h3', 0)->outertext = '';

//remove header
$main->find('.header-logo', 0)->outertext = '';

//remove last p
$main->find('div > p', -1)->outertext = '';

//remove disclamer
$main->find('.article-disclaimer', 0)->outertext = '';

//remove creator
$main->find('.community-author-bottom', 0)->outertext = '';

//anti href
foreach($main->find('a') as $element) {
	$element->outertext = $element->plaintext;
}

//anti ul
foreach($main->find('ul') as $element) {
	$element->outertext = '';
}

//anti class editorpick
foreach($main->find('.editors-pick') as $element) {
	$element->outertext = '';
}



?>
<head>
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="jumbotron"><h1><? echo ucwords("$title"); ?></h1><br/><br/>
	<? echo $main; ?>
	<br/><br/>Referensi IDNTimes. 
	</div>
	
	<script>
	$( "img" ).wrap( "<center></center>" );
	
	$(function() {
	  $("img").each(function() {
		var src = $(this).attr('src');
		var a = $('<a/>').attr('href', 'http://kuliah-kalkulus.sheva.my.id/tampil-gambar/?url=' + src);
		$(this).wrap(a);
	  });
	});
	
	var x = document.querySelectorAll('img');
	var n = x.length - 1;
	
	// sleep time expects milliseconds
	function sleep (time) {
	  return new Promise((resolve) => setTimeout(resolve, time));
	}

	// Usage!
	sleep(500).then(() => {
		// $( "img:eq( 2 )" ).replaceWith( "<h2>LIHAT GAMBAR</h2>" );
		// $( "img:eq( -2 )" ).replaceWith( "<h2>LIHAT GAMBAR</h2>" );
	});
	
	$('p:contains("Baca Juga: ")').remove();
	
	$( "p" ).append( "<br/><br/>" );

	</script>
</body>
