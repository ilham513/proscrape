		<div style="text-align: right;">
		<h1 style="color:red;">Terima Kasih Sudah Mampir. Jangan Lupa Berkomentar!</h1><br/>
		<h2 style="color:gold;"> KARENA Komentar Kalian Semangat Saya Untuk Terus Update! </h2><br/>
		<img id="img-tar" src="#"/><br/>.
				
		<?
		$ts = file_get_html("https://www.kaskus.co.id/@kadal404/viewallthreads");
		  
		foreach($ts->find('img') as $element) {
			if(substr($element->src,0,21)=='https://dl.kaskus.id/'){
				$ts_jdl[]  = ucwords(str_replace("-"," ",$element->alt));
				$ts_link[] = "https://www.kaskus.co.id".$element-> parent()-> parent()->href;
				$ts_img[]  = $element->src;
			}
		}

		?>
		
		<h2><img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/> ==== Wajib Baca Threat Ini Juga! ==== <img src="https://bantuan.kaskus.co.id/hc/article_attachments/115007021608/smilies_fb5ly1j43vv5.gif"/></h2>
		
		<br/>.<br/>.
		<h2><a href="<?echo $ts_link[0]?>" class="kaskus"><?echo $ts_jdl[0]?></a></h2>
		<a href="<?echo $ts_link[0]?>" class="kaskus"><img src="<?echo $ts_img[0]?>"/></a>
		
		<br/>.<br/>.
		<h2><a href="<?echo $ts_link[1]?>" class="kaskus"><?echo $ts_jdl[1]?></a></h2>
		<a href="<?echo $ts_link[1]?>" class="kaskus"><img src="<?echo $ts_img[1]?>"/></a>
		
		<br/>.<br/>.
		<h2><a href="<?echo $ts_link[2]?>" class="kaskus"><?echo $ts_jdl[2]?></a></h2>
		<a href="<?echo $ts_link[2]?>" class="kaskus"><img src="<?echo $ts_img[2]?>"/></a>