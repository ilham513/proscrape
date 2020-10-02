<? error_reporting(E_ERROR);//DISABLE ERROR
$url = $_GET['url'];
// echo $url;

//ambli blog
$xml = simplexml_load_file("http://isetiabhakti.blogspot.com/atom.xml") or die ("Unable to load XML file!");
// Ambil Href
$xml =  $xml ->entry->link[4]->attributes()->href;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

//main & title//
$main = $html->find('div.entry-essentials', 0);
$title = $html->find('h1', 0)->plaintext;

//anti href
foreach($main->find('a') as $element) {
	$element->outertext = $element->plaintext;
}

//anti img
foreach($main->find('img') as $element) {
	$element->srcset = '';
}

//main anti promo p
$main->find('div > p', -1)->outertext = '';
$main->find('div > p', -2)->outertext = '';
$main->find('div > p', -3)->outertext = '';
?>
<head>
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>	
<div class="jumbotron"><h1><? echo strtoupper("$title"); ?></h1><br/><br/>

	<? echo $main->find('p > img', 0); ?>
	<? include_once('../include_kaskus_header.php') ?>
	
	<br/><br/>
	
	<? echo $main; ?>
	
	<br/><br/>Sumber Referensi <a href="<?echo $url?>">NgakakOnline.id</a>.
	<br/>.<br/>.<br/>.<br/>
	<? include_once('../include_kaskus.php') ?>
</div>


	<script>
	$( "img.aligncenter.jetpack-lazy-image" ).wrap( "<center></center>" );
	
	$(function() {
	  $("img.aligncenter.jetpack-lazy-image").each(function() {
		var src = $(this).attr('src');
		var a = $('<a/>').attr('href', '<?echo $xml?>');
		$(this).wrap(a);
	  });
	});
	
	var x = document.querySelectorAll('img.aligncenter.jetpack-lazy-image');
	var n = x.length - 2;
	
	// sleep time expects milliseconds
	function sleep (time) {
	  return new Promise((resolve) => setTimeout(resolve, time));
	}

	// Usage!
	sleep(500).then(() => {
		x[n].src = 'https://i.postimg.cc/zDLrc2nh/image.png';
	});
	
	$('img').removeAttr('width').removeAttr('height');
	
	$( "p" ).append( "<br/><br/>" );
	
	
	$('.multipage-itembreak').remove();
	
	var greetings = [
	"https://i.postimg.cc/Gp9b3ZfP/bwee.gif",
	"https://i.postimg.cc/3x8KVyCc/clingg.gif",
	"https://i.postimg.cc/K80Z2Z0v/gif-thumb-up.gif"
	];
	
	var greeting_id = Math.floor(Math.random() * greetings.length);
	
	document.getElementById('img-tar').src = greetings[greeting_id];

	</script>
