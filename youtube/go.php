<? error_reporting(E_ERROR);//DISABLE ERROR
if(isset($_GET['playlist'])){
	include_once("go_playlist.php");
}else{
$url = $_GET['url'];
$url = $_GET['url'];
$token = explode("/watch?v=",$url);
$token = $token[1];

echo "<center>";

echo "<h1>".get_youtube_title($token)."</h1>";

echo "<p><img src='https://i.ytimg.com/vi/".$token."/hqdefault.jpg'/></p>";

function get_youtube_title($ref) {
      $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
      $details = json_decode($json, true); //parse the JSON into an array
	  $judul_final = substr($details['title'],0,-19);
      return $judul_final; //return the video title
}

echo "<p> [youtube]".$token."[/youtube] </p>";

echo "<p> <img src='https://i.postimg.cc/6QZq6HjC/image.png'/> </p>";



// include_once('../simple_html_dom.php');
// $html = file_get_html($url);
// echo $html;
}