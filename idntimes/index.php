<? include_once('../simple_html_dom.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IDNTIMES</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
		<div class="col-md-4" style="height: 300px;text-align: left;overflow: auto;font-size: 24px;">
	    <?
			$url = "https://www.idntimes.com/tag/anime";
			$html = file_get_html($url);
			// echo $html;die();

			foreach($html->find('a') as $element) {
				$element->href = "go.php?url=".$element->href;
			}

			foreach($html->find('h2.title-text') as $element) {
				echo $element->parent()."<hr/>";
			}
		?>
		</div>
  </body>
</html>