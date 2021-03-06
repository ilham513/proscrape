<? include_once('../simple_html_dom.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Danbooru Proscrape</title>
<meta charset="UTF-8">
<link rel="icon" href="https://i.imgur.com/0GsEGfN.png" type="image/gif" sizes="192x192">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>


<body bgcolor="white">
<ul class="breadcrumb">
  <li>Home</li>
</ul>

<center>
<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">

	    <?
			$url = "https://danbooru.donmai.us/explore/posts/popular?date=".date("Y-m-d",strtotime("-1 days"));
			
			if(isset($_GET['page'])){
				$p = $_GET['page'];
				
				//url+page pengarah indikator parameter
				$url = $url."&page=$p";
				
				//keluarkan button sbelumnya
				if($p>1){ //jika page 1 = tidak usah tampil
					echo '<a href="?page=' .($p-1). '"><button class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-left w3-large w3-blue">Sebelumnya</button></a>';
				}
			}
			
			$html = file_get_html($url);
			// echo $html;die(); //TESTTEST TEST TEST

			foreach($html->find('a') as $element) {
				if( substr($element->href,0,7) == '/posts/' ){
					
					// echo $element; die(); //TEST TEST TEST
					
					
					//filter varibel
					$url_post_prefix = $element->href; //ok
					$url_post_original = 'https://danbooru.donmai.us'.$url_post_prefix; 
					$url_post_scraping = 'go.php?url='.$url_post_original; 
					
					
					$gambar_post = $element->children(0)->children(2)->src; //ok
					
					
					## FILTER ##
					//filter server luar
					$gambar_post_filter = 'https://imagex.aratech.co/?url='.	str_replace	(	array("https://","http://")	,	""	,	$gambar_post	);
					
					//filter server dalam
					// $gambar_post_filter = 'https://dl.kaskus.id/'.	str_replace	(	array("https://","http://")	,	""	,	$gambar_post	);
					## FILTER END ##
					
					$img_title = $element->children(0)->children(2)->title; #alt text
					
					
					#echo $gambar_post."<hr/>";
					?>
					<div class="w3-card-4 <? if(strpos($img_title, 'animated')){echo 'w3-black';} ?>">
						<div>
							<a href="<?echo $url_post_scraping?>"><img id="566" src="<? echo $gambar_post_filter ?>" class="w3-image w3-margin-top" loading=”lazy” width="80%"></a>
							<br/>
							
							<p><? echo $img_title ?></p>

							<div class="w3-row w3-margin-right">
							  <div class="w3-col s6 w3-container">
								<a href="#"><button  type="button" class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-bottom w3-large w3-red w3-block"><i class="fa fa-times"></i> Hard</button></a>
							  </div>
							  <div class="w3-col s6 w3-container">
								<a href="like.php?id=566&page="><button  type="button" class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-bottom w3-large w3-green w3-block"><i class="fa fa-check"></i> Soft</button></a>
							  </div>
							</div>							
						</div>
					</div>
					<hr/>
					<?
				}
			}
		?>

		
		
		
		
		<?
		if(!isset($_GET['page'])){
			$p = 1;
		}
		?>
		<a href="?page=<? echo ($p+1); ?>"><button class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-left w3-large w3-blue">Selanjutnya</button></a>
</div>
</body>
<script>
//$("p:contains(animated)").css("background-color", "yellow");
</script>
</html>