<? include_once('../simple_html_dom.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRILIO</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body class="text-center">	
	<div class="container">
	  <div class="row">
		<div class="col-md-4" style="height: 255px;text-align: left;overflow: auto;font-size: 24px;">
	    <?
			$url = "https://www.brilio.net/ngakak/";
			$html = file_get_html($url);
			// echo $html;die();

			foreach($html->find('a') as $element) {
				$element->href = "go.php?url=https://www.brilio.net".$element->href;
			}

			foreach($html->find('a[target=_self]') as $element) {
				echo $element."<hr/>";
			}
		?>
		</div>
		<div class="col-md-4">
			  <form class="form-signin" action="go.php" method="get">
			  <img class="mb-4" src="https://cdn-brilio-net.akamaized.net/static/www/assets/v3/img/logo-top-1.png" alt="" width="132" height="72">
			  <h1 class="h3 mb-3 font-weight-normal">URL</h1>
			  <input onfocus="this.value=''" type="text" name="url" class="form-control" placeholder="https://www.brilio.net/..." required autofocus><hr/>
			  <button class="btn btn-lg btn-primary btn-block" type="submit">GO</button>
			  <p class="mt-5 mb-3 text-muted">&copy; 2020 by ilham513</p>
			  </form>
		</div>
		<div class="col-md-4" style="height: 255px;text-align: left;overflow: auto;font-size: 24px;">
	    <?
			$url = "https://www.brilio.net/selebritis/";
			$html = file_get_html($url);
			// echo $html;die();

			foreach($html->find('a') as $element) {
				$element->href = "go.php?url=https://www.brilio.net".$element->href;
			}

			foreach($html->find('a[target=_self]') as $element) {
				echo $element."<hr/>";
			}
		?>
		</div>
	  </div>
	</div>
	
	<script>
	</script>
  </body>
</html>
