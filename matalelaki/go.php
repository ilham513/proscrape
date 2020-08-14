<? error_reporting(E_ERROR);//DISABLE ERROR
$url = $_GET['url'];
// echo $url;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

//no-script
foreach($html->find('script') as $element) {
	$element->outertext = '';
}

//anti promo
$html->find('div.detail-box', 0)->outertext = '';



//main & title//
$main = $html->find('div.post-content', 0);
$title = $html->find('h1', 0);

//strong one
$html->find('strong', 0)->outertext = '';
$html->find('b', 0)->outertext = '';

//anti href
foreach($main->find('a') as $element) {
	$element->outertext = $element->plaintext;  
}

//anti lazyload
foreach($main->find('img') as $element) {
	$element->src = "https://matalelaki.com".$element->src;
}



?>
<head>
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="jumbotron"><h1><? echo strtoupper("$title"); ?></h1><br/><br/>
	<? echo $main->find('img', 0); ?>
	<? include_once('../include_kaskus_header.php') ?>
	<br/><br/>
		<? echo $main; ?>
		<br/><br/>Referensi <a href="<?echo $url?>">Matalelaki.com</a>.
		<br/>.<br/>.<br/>.<br/>
		<? include_once('../include_kaskus.php') ?>
		</div>
		
		<!--
		<div style="text-align: center;"><h2>Hayuu Cek, Mumpung Lagi Promo!</h2>
		<a href="https://ilham513.github.io/sweeter-murah.html"><img src="http://tiny.cc/banner-513"/></a>
		</div>
		-->
	</div>
	
	<script>
	$( "img.img-responsive" ).wrap( "<center></center>" );
	
	$(function() {
	  $("img.img-responsive").each(function() {
		var src = $(this).attr('src');
		var a = $('<a/>').attr('href', 'http://link.sheva.my.id/kaskus/?img=' + src);
		$(this).wrap(a);
	  });
	});
	
	var x = document.querySelectorAll('img.img-responsive');
	var n = x.length - 2;
	
	// sleep time expects milliseconds
	function sleep (time) {
	  return new Promise((resolve) => setTimeout(resolve, time));
	}

	// Usage!
	sleep(500).then(() => {
		x[2].src = 'https://i.postimg.cc/C1ZyRJSk/image.png';
		x[n].src = 'https://i.postimg.cc/C1ZyRJSk/image.png';
	});
	
	$( "p" ).append( "<br/><br/>" );
	
	$('.multipage-itembreak').remove();
	
	var greetings = [
	"https://i.postimg.cc/x1gDSrSc/Angry.gif",
	"https://i.postimg.cc/7Z3dMFLK/fuwa-fuwa.gif",
	"https://i.postimg.cc/Vsb80HXV/huwaaa.gif",
	"https://i.postimg.cc/zGk5XbTD/kyaaaa.gif",
	"https://i.postimg.cc/DzZVvC25/zettai.gif"
	];
	
	var greeting_id = Math.floor(Math.random() * greetings.length);
	
	document.getElementById('img-tar').src = greetings[greeting_id];

	</script>
</body>
