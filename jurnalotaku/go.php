<? error_reporting(E_ERROR);//DISABLE ERROR
// $url = $_GET['url'];
// $url = 'http://jurnalotaku.com/2020/09/02/waifu-wednesday-chiyoda-momo/';
// $url = 'http://jurnalotaku.com/2019/11/20/waifu-wednesday-yuuko-shamiko-yoshida/';
// $url = 'http://jurnalotaku.com/2017/03/01/waifu-wednesday-darkness/';
// $url = 'http://jurnalotaku.com/2020/08/19/waifu-wednesday-katarina-claes/';
$url = 'http://jurnalotaku.com/2020/06/03/waifu-wednesday-shinomiya-kaguya/';
// echo $url;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

//title//
$title = $html->find('h1', 0);
$title = str_replace("[Waifu Wednesday]","Waifu Terbaik Edisi",$title);
echo $title;

//cover//
$cover = $html->find('div.meta-cover > img', 0);
echo "<center><img width='800' height='600' src='" . $cover->src . "'/></center>";

//main//
$main = $html->find('div.meta-content', 0);
// echo $main;

//anti href
foreach($main->find('a') as $element) {
	$element->outertext = $element->plaintext;
}

//op//
$op = $main->find('p', 0);
echo $op->next_sibling().".";
echo $op->next_sibling()->next_sibling()."<br/>.<br/>.<br/>.";


//h2a//
$h2a = $main->find('h2', 0);
echo $h2a;
echo $h2a->next_sibling();
echo $h2a->next_sibling()->next_sibling().".";
echo $h2a->next_sibling()->next_sibling()->next_sibling()."<br/>.<br/>.<br/>.";


//h2b//
$h2b = $main->find('h2', 1);
echo $h2b;
echo $h2b->next_sibling();
echo $h2b->next_sibling()->next_sibling().".";
echo $h2b->next_sibling()->next_sibling()->next_sibling()."<br/>.<br/>.<br/>.";

//h2c//
$h2c = $main->find('h2', 2);
echo $h2c;
echo $h2c->next_sibling();
echo $h2c->next_sibling()->next_sibling().".";
echo $h2c->next_sibling()->next_sibling()->next_sibling()."<br/>.<br/>.<br/>.";


?>
Sumber JurnalOtaku.com