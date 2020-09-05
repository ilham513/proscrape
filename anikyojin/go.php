<? error_reporting(E_ERROR);//DISABLE ERROR
$url = $_GET['url'];
// echo $url;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

//title//
$title = $html->find('h1.pstitle', 0);
echo "<h1>Anime ".$title->plaintext." Lengkap!</h1>";

//image//
$img = $html->find('div.thumbnail3 > img', 0);
echo "<center>".$img."</center><hr/>";

//sinop//
$sinop = $html->find('div.kontent.sinop.gantol', 0);
echo $sinop."<hr/>";

//info//
$info = $html->find('div.kontent.infox.gantol', 0);
echo $info."<hr/>";

//Remove Unnecesarry Link//
$html->find('div.downloadcloud', -1)->outertext = '';

//Panduan DOwnload//
echo "<center><a href='https://sites.google.com/view/cara-download-melalui-adfly'><h1>Baca Panduan Download di Sini!</h1></a></center><hr/>";

//link download//
echo "<p><h1>Link Download</h1></p>";

//dlink//
foreach($html->find('div.downloadcloud') as $element) {
	$link_ori = $element->children(1)->children(2)->children(1)->href;
	echo "<div class='episode'>";
	echo "<a href='http://adf.ly/4565140/".$link_ori."'><h2>Download ".$element->children(0)->plaintext  ."</h2></a>";
	echo "</div>";
}

echo "*<i>Jangan Lupa Baca Panduan Mendownload!</i><br/><strong>Jika Ada Error silakan tulis di kolam komentar ^_^ / </strong><hr/>THIS VIDEO JUST A SAMPLE! BUY DISK ON YOUR NEAR STORE OR RENT ON SREAMING SERVICE!!";


// //dlink//
// foreach($html->find('div.downloadcloud > ul > li[3]') as $element) {
	// echo $element;
// }




?>

<script>
var all_links = document.querySelectorAll("div.kontent.infox.gantol > ul > li > a");

for(var i=0; i<all_links.length; i++){
    all_links[i].removeAttribute("href");
}

var nodes = document.querySelectorAll("div.episode");
var first = nodes[0];
var last = nodes[nodes.length- 1];
last.remove();
</script>