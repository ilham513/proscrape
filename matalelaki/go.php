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
	<h2 style="color:green;">
	Halo para Kaskuser. Kembali lagi bersama saya, <u>ilham513</u>, yang selalu menyuguhkan informasi <u>menarik dan unik</u> setiap harinya <u>Untuk Anda</u>.
	<img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007024568/smilies_fbeqyos6i5nk.gif"/>
	</h2> 

	<br/><br/>
		<? echo $main; ?>
		<br/><br/>Referensi <a href="<?echo $url?>">Matalelaki.com</a>.
		<br/>.<br/>.<br/>.<br/>
		
		<div style="text-align: right;">
		<h1 style="color:DodgerBlue;">Terima Kasih Sudah Mampir Ke Trit Sederhana Ini! Jangan Lupa Berkomentar.</h1><br/>
		<h2 style="color:red;"> (Karena Komentar Kalian Semangat Saya Untuk Terus Update!) </h2><br/>
		<img id="img-tar" src="#"/><br/>.<br/>.<br/>.<br/>..<br/>.<br/>.<br/>.
		
		<center>
		<br/>.
		<img src="http://1.bp.blogspot.com/-3fNvSDsZ_9s/VNQ4gxcJ0bI/AAAAAAAADHo/v0oKPVICj7E/s1600/sayembara-cari-pacar.jpg"/>
		<br/>.
		<br/>.
		<br/>.
		<h2>Komentar Terbaik Minggu Ini</h2>
		<img src="http://tiny.cc/komentar-kaskus-terbaik"/>
		</center>
		
		
				<br/>.
		<br/>.
		<br/>.				
		<br/>.
		<br/>.
		<br/>.
		
		<?
		$ts = file_get_html("https://www.kaskus.co.id/@ilham513/viewallthreads");
		  
		foreach($ts->find('img') as $element) {
			if(substr($element->src,0,21)=='https://dl.kaskus.id/'){
				$ts_jdl[]  = ucwords(str_replace("-"," ",$element->alt));
				$ts_link[] = "https://www.kaskus.co.id".$element-> parent()-> parent()->href;
				$ts_img[]  = $element->src;
			}
		}

		?>
		
		<h2><img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007171267/smilies_fber17aocqul.gif"/> --- Baca Juga --- <img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007171267/smilies_fber17aocqul.gif"/></h2>
		
		<br/>.<br/>.<br/>.
		<h2><a href="<?echo $ts_link[0]?>" class="kaskus"><?echo $ts_jdl[0]?></a></h2>
		<a href="<?echo $ts_link[0]?>" class="kaskus"><img src="<?echo $ts_img[0]?>"/></a>
		
		<br/>.<br/>.<br/>.
		<h2><a href="<?echo $ts_link[1]?>" class="kaskus"><?echo $ts_jdl[1]?></a></h2>
		<a href="<?echo $ts_link[1]?>" class="kaskus"><img src="<?echo $ts_img[1]?>"/></a>
		
		<br/>.<br/>.<br/>.
		<h2><a href="<?echo $ts_link[2]?>" class="kaskus"><?echo $ts_jdl[2]?></a></h2>
		<a href="<?echo $ts_link[2]?>" class="kaskus"><img src="<?echo $ts_img[2]?>"/></a>
		
		<br/>.
		<br/>.
		<br/>.


		


		
		<br/>
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
