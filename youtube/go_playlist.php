<? 
include_once('../simple_html_dom.php');

$id_playlist = $_GET['playlist'];
$id_playlist = explode("list=",$id_playlist);

// echo $id_playlist[1];die();

$id_playlist = $id_playlist[1];

// Perse XML
$xml = simplexml_load_file("https://www.youtube.com/feeds/videos.xml?playlist_id=".$id_playlist) or die ("Unable to load XML file!");

// echo "<pre><h2>"; print_r($xml); die();

echo "<h1>" . $xml->title . "</h1>";

$i = 0;

echo "<p><center><img src='https://i.ytimg.com/vi/". substr($xml->entry->id,9) . "/hqdefault.jpg'/></center></p>";

//random array function you can use or write your own
function acak_pembuka(){
	$pembuka = array(
	"Alhamdulilah, salam sejahtera untuk kita semua karena pada saat ini kita masih bisa hidup dan diberikan kenikmatan mendengar, melihat dan merasakan. Sungguh suatu karunia yang sangat besar dari tuhan yang diberikan kepada kita. Untuk itu mari kita sama-sama untuk selalu senantiasa bersyukur atas segala nikmat yang mulia ini."
	,"Selamat datang, salam bagi kita semua. Semoga tuhan selalu melimpahkan kasih sayangnya pada kita semua disini. Hari ini disini ijin kan saya memperkenalkan diri saya terlebih dahulu. Karena pepatah orang tua mengatakan tak kenal maka tak sayang. Perkenalkan saya Setia Ballmer akan membagikan informasi menarik untuk hari ini."
	,"Assalamualaikum warahmatullahi wabarakatuh, puji syukur ke hadirat allah sebagaimana sampai hari ini kita masih diberi kesehatan. Di hari yang berbahagia ini harapan saya kita semua dapat terus menuntut berbagi kebahagiaan untuk kehidupan yang lebih baik."
	,"Para hadirin yang senantiasa bersyukur dan dirahmati allah, semoga tuhan selalu melimpahkan kebaikan kepada kita semua. Hari ini saya kembali mempoting trit yang unik untuk kalian.");
	
	return $pembuka[array_rand($pembuka)];
}
  
//echo pembuka
echo "<h2 color='green'>".acak_pembuka()."</h2><br/>";
echo "<p>Langsung aja ya, sesuai judul saya akan membagian seperti yang di bawah ini: </p><br/><br/>";

foreach($xml->entry as $entry){
	$i += 1;
	echo "<br/><br/><strong>$i. " . substr($entry->title,0,-37) . "</strong>"; 
	echo "<p><center> [youtube]". substr($entry->id,9) ."[/youtube] <br/>Sumber Youtube.com</center> </p><br/><br/>";
}

echo "<p><center> <img src='https://dummyimage.com/900x400/000/fff&text=Jika+Postingan+Ini+Melanggar,+PM+Aja'/> </center></p>";
?>

<?
$ts = file_get_html("https://www.kaskus.co.id/@setia513/viewallthreads");
  
foreach($ts->find('img') as $element) {
	if(substr($element->src,0,21)=='https://dl.kaskus.id/'){
		$ts_jdl[]  = ucwords(str_replace("-"," ",$element->alt));
		$ts_link[] = "https://www.kaskus.co.id".$element-> parent()-> parent()->href;
		$ts_img[]  = $element->src;
	}
}

?>


		<h2><img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/> -=- Harus Baca Ini Juga! =-= <img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/></h2>
		
		<br/>.<br/>.
		<strong><a href="<?echo $ts_link[0]?>" class="kaskus"><?echo $ts_jdl[0]?></a></strong><br/>.
		<a href="<?echo $ts_link[0]?>" class="kaskus"><img src="<?echo $ts_img[0]?>"/></a>
		
		<br/>.<br/>.
		<strong><a href="<?echo $ts_link[1]?>" class="kaskus"><?echo $ts_jdl[1]?></a></strong><br/>.
		<a href="<?echo $ts_link[1]?>" class="kaskus"><img src="<?echo $ts_img[1]?>"/></a>
		
		<br/>.<br/>.
		<strong><a href="<?echo $ts_link[2]?>" class="kaskus"><?echo $ts_jdl[2]?></a></strong><br/>.
		<a href="<?echo $ts_link[2]?>" class="kaskus"><img src="<?echo $ts_img[2]?>"/></a>		
		<br/>.<br/>.
		<strong><a href="<?echo $ts_link[3]?>" class="kaskus"><?echo $ts_jdl[3]?></a></strong><br/>.
		<a href="<?echo $ts_link[3]?>" class="kaskus"><img src="<?echo $ts_img[3]?>"/></a>