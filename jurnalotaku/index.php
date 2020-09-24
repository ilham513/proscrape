<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Youtube Kaskus</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body class="text-center">
  <div class="row container">
    <div class="col" id="demo">
      
    </div>
    <div class="col">
	  <form class="form-signin" action="go.php" method="get">
      <img class="mb-4" src="https://cdn3.ngin.com/attachments/photo/1590/2936/youtube_logo_0_small.png" alt="" width="132" height="72">
      <h1 class="h3 mb-3 font-weight-normal">URL</h1>
      <!-- <input type="text" name="url" onfocus="this.value=''" class="form-control" placeholder="https://youtube.com/..." autofocus><hr/> -->
      <input type="text" name="playlist" onfocus="this.value=''" class="form-control" placeholder="untuk playlist" autofocus><hr/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">GO</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

    </div>
  </div>
  </body>
  <script>
/*
  function httpGet(theUrl)
{
   var xmlHttp = new XMLHttpRequest();
   xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
   xmlHttp.send( null );
   return xmlHttp.responseText;
}

var response = httpGet("https://content.googleapis.com/youtube/v3/playlists?channelId=UCk4puSDkO8-A6GlkgitG30w&maxResults=50&part=snippet&key=AIzaSyAHz_di2tqH_fd1qbPlgCF2IlEp28tsFjk");

console.log(response);
*/

fetch("https://content.googleapis.com/youtube/v3/playlists?channelId=UCk4puSDkO8-A6GlkgitG30w&maxResults=50&part=snippet&key=AIzaSyAHz_di2tqH_fd1qbPlgCF2IlEp28tsFjk")
  .then((res) => res.json())
  .then((data) => {
    const res = data.items;
    console.log(res.length);
    var i;
    for (i = 0; i < 5; i++) {
      console.log(res[i].id);
      console.log(res[i].snippet.title);
      $("#demo").append("<p><a href='go.php?playlist=list%3D" + res[i].id + "'><h5>"+ res[i].snippet.title +"</h5></a><hr/></p>");
    }
  });

  </script>
</html>
