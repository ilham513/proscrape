<? error_reporting(E_ERROR);//DISABLE ERROR
$url = $_GET['url'];
// echo $url;

include_once('../simple_html_dom.php');
$html = file_get_html($url);
// echo $html;

//main//
$main = $html->find('article', 0);

//Remove Header & Footer//
$main->find('header', 0)->outertext = '';
$main->find('footer', 0)->outertext = '';

$main = str_replace("<table","<p",$main);
$main = str_replace("</table>","</p>",$main);

$main = str_replace("<td>","  ||  ",$main);
$main = str_replace("</td>","  ||  ",$main);

$main = str_replace("<tr>","  <p id='row'>",$main);
$main = str_replace("</tr>"," </p><hr/> ",$main);

echo $main;
?>

<script>
var all_row = document.querySelectorAll("p#row");

for(var i=0; i<all_row.length; i++){
    //all_row[i].removeChild(elements[0]);
}
</script>