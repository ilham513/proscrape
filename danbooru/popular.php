<? include_once('../simple_html_dom.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Popular</title>
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

<center>
<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">

	    <?
			$url = "https://danbooru.donmai.us/explore/posts/popular?date=".date("Y-m-d",strtotime("-1 days"));
			
			
			
			//PAGENITION ATAS
			if(isset($_GET['page'])){
				$p = $_GET['page'];
				
				//url+page pengarah indikator parameter
				$url = $url."&page=$p";
				
				//keluarkan button sbelumnya
				if($p>1){ //jika page 1 = tidak usah tampil
					echo '<a href="?page=' .($p-1). '"><button class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-left w3-large w3-blue">Sebelumnya</button></a>';
				}
			}
			
			
			
			
			//// MULAI DOM
			$html = file_get_html($url);
			// echo $html;die(); //TESTTEST TEST TEST

			// MULAI DOM LOOP
			foreach($html->find('article') as $i=>$element) {
				
				//inisiasi data
				$url_post_id = $element->getAttribute('data-id');
				$gambar_post = $element->getAttribute('data-large-file-url');
				$gambar_tags = $element->getAttribute('data-tags');
				
				//filter varibel url
				$url_post_original = 'https://danbooru.donmai.us/posts/'.$url_post_id; 
				$url_post_scraping = 'go.php?url='.$url_post_original; 
				
				//filter variabel gambar_post
				//jika gambar animated
				if(strpos($gambar_tags, 'animated')){$gambar_post = $element->getAttribute('data-preview-file-url');}
				$gambar_post_filter = 'https://imagex.aratech.co/?url='.	str_replace	(	array("https://","http://")	,	""	,	$gambar_post	); ##SERVER ARATECH
				//$gambar_post_filter = 'https://dl.kaskus.id/'.	str_replace	(	array("https://","http://")	,	""	,	$gambar_post	); #SERVER KASKUS - Disabled

				
				
				?>
					<div class="w3-card-4 <? if(strpos($gambar_tags, 'animated')){echo 'w3-black';} ?>">
						<div>
							<img src="<? echo $gambar_post_filter ?>" id="<? echo $i; ?>" class="w3-image w3-margin-top" loading=”lazy” width="80%" onclick="onClick(this)">
							<br/>
							
							<p>
							<textarea class="w3-input w3-border"><? echo $gambar_tags ?></textarea>
							</p>

							<div class="w3-row w3-margin-right">
							  <div class="w3-col s12 w3-container">
								<!--<a href="http://hinata18.is-best.net/inject/tampung-sementara.php?url=echo $gambar_post&tipe=hard&callback=echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]%23$i" ?>"><button  type="button" class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-bottom w3-large w3-green w3-block"><i class="fa fa-check"></i> Gaskeun</button></a>-->
								<a href="popular_filter.php?url=<?= $url_post_original. "&callback=http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."%23$i"?>"><button  type="button" class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-bottom w3-large w3-green w3-block"><i class="fa fa-check"></i> Gaskeun</button></a>
							  </div>
							  </div>
							</div>							
						</div>
					</div>
					<hr/>
				<?
			}
			
			
		?>

		
		
		
		<?
		//PAGENITION BAWAH
		if(!isset($_GET['page'])){
			$p = 1;
		}
		?>
		<a href="?page=<? echo ($p+1); ?>"><button class="w3-padding-16 w3-margin w3-button w3-theme-d1 w3-margin-left w3-large w3-blue">Selanjutnya</button></a><hr/>
</div>
</body>

<!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-small w3-black w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>
  
<script>
//$("p:contains(animated)").css("background-color", "yellow");

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
</html>