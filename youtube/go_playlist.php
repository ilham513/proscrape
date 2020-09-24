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

  
//echo pembuka
echo "<h2 color='green' id='pembuka'></h2><br/>";
echo "<div id='baconIpsumOutput'></div>";
echo "<p>Langsung aja ya, sesuai judul saya akan membagian seperti yang di bawah ini: </p><br/><br/>";

foreach($xml->entry as $entry){
	$i += 1;
	$title = str_replace(" | Klip Anime Lucu (Link di Deskripsi)","",$entry->title);
	$title = str_replace(" Klip Anime Sub Indo Link di Deskripsi","",$title);
	$title = str_replace(" Klip Anime Sub Indo (Link di Deskripsi)","",$title);
	echo "<br/><br/><strong>$i. " . $title . "</strong>"; 
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


		<center><img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/>[size=7] -=- Harus Baca Ini Juga! =-= [/size]<img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/></center>
		
		<br/>.<br/>.<br/>
		[size=7][url=<?echo $ts_link[0]?>]<?echo $ts_jdl[0]?>[/url][/size]<br/>
		<img src="<?echo $ts_img[0]?>"/></a>
		
		<br/>.<br/>.<br/>
		[size=7][url=<?echo $ts_link[1]?>]<?echo $ts_jdl[1]?>[/url][/size]<br/>
		<img src="<?echo $ts_img[1]?>"/></a>
		
		<br/>.<br/>.<br/>
		[size=7][url=<?echo $ts_link[2]?>]<?echo $ts_jdl[2]?>[/url][/size]<br/>
		<img src="<?echo $ts_img[2]?>"/></a>
		
		<br/>.<br/>.<br/>
		[size=7][url=<?echo $ts_link[3]?>]<?echo $ts_jdl[3]?>[/url][/size]<br/>
		<img src="<?echo $ts_img[3]?>"/></a>
		
<script>
$(document).ready(function() 
{
	$.getJSON('https://baconipsum.com/api/?callback=?', 
		{ 'type':'meat-and-filler', 'start-with-lorem':'1', 'paras':'1' }, 
		function(baconGoodness)
	{
		if (baconGoodness && baconGoodness.length > 0)
		{
			$("#baconIpsumOutput").html('');
			for (var i = 0; i < baconGoodness.length; i++)
				$("#baconIpsumOutput").append('[spoiler=PENGLARIS]<p>' + baconGoodness[i] + '</p>[/spoiler]');
		}
	});
});
		
var answers = [
  "Hey para Kaskuser, Selamat datang di Threat Saya yang sederhana dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^",
  "Hey para Kaskuser, Selamat datang di Threat Saya yang Good Joss dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^",
  "Howdy para Kaskuser, Selamat datang di Threat Ane yang Simple dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke Friend kalian. Terima Kasih ^_^",
  "Howdy para Kaskuser, Selamat datang di Threat Saya yang sederhana dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^",
  "Hello para Kaskuser, Selamat datang di Threat Aku yang sederhana dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^",
  "Alright para Kaskuser, Selamat datang di Threat Saya yang sederhana dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^",
  "Alright para Kaskuser, Welcome to my Threat yang sederhana dan menawan ini. Jika kalian terhibur jangan lupa kasih CENDOL dan SHARE ke teman kalian. Terima Kasih ^_^"
]

var randomAnswer = answers[Math.floor(Math.random() * answers.length)];

console.log(randomAnswer);
$( "#pembuka" ).append( randomAnswer );
</script>
		