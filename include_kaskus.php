		
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
		
		<br/>
				
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


		
