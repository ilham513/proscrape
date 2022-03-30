<h4><?= ucfirst($_POST['judul']) ?></h4>
<hr/>
<?php
	if($_POST['tipe']=='komik'){
		$tipe = 'komik';
		$dot = 'PDF';
	}elseif($_POST['tipe']=='ilustrasi'){
		$tipe = 'ilustrasi';
		$dot = 'PDF';
	}else{
		$tipe = 'shorts';
		$dot = 'MP4';
	}
?>

<h4><?= ucfirst($tipe)." ".ucfirst($_POST['judul'])." ".$dot ?></h4>

<hr/>

<?php
	if($_POST['money']=='true'){
		$link = 'http://ouo.io/qs/wPpb4LHb?s='.$_POST['link'];
	}else{
		$link = $_POST['link'];
	}
?>

<textarea rows="20" cols="120">
<!-- wp:image {"id":12,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?= $_POST['gambar'] ?>" alt="" class="wp-image-12"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><strong>Sinopsis</strong><br><?= $_POST['sinopsis'] ?>.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"align":"center","className":"is-style-fill"} -->
<div class="wp-block-button aligncenter has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link" href="<?= $link ?>" target="_blank" rel="noreferrer noopener">Download <?= $dot ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph -->
<p><i>Binggung? <span style="text-decoration:underline;"><a href="https://komikanime18.wordpress.com/cara-download/">Baca Panduan Download</a></span></i></p>
<!-- /wp:paragraph -->
</textarea>