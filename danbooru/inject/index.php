<? include('../koneksi.php'); #KONEKSI?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Inject Execute</title>
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
	<div class="w3-container">
		<div class="w3-bar w3-black">
		  <a href="index.php"><button class="w3-button w3-left">HOME INJECT</button></a>
		</div>
	</div>
	
	<br/>
	<br/>

	<div class="w3-container">
	<form class="w3-container w3-card-4" method="post" action="index-go.php">
	
	
<?

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


##RUMUS HINATA 2, SOFT 3, HARD 1##


//ambil hinata
$sql = "SELECT * FROM hinata18_tampung_sementara WHERE tipe='hinata' AND status='perawan' LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 1) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	//muntahin dulu idnya buat apus
	echo  '<input type="hidden" name="arridurl[]" value="'.$row["id_url"].'">';
	
	//inisiasi varibel
	$id_url[] = $row["id_url"]; //unik
  }
} else {
  echo "<h1><mark>HINATA KURANG";die();
}


//ambil soft
$sql = "SELECT * FROM hinata18_tampung_sementara WHERE tipe='soft' AND status='perawan' LIMIT 3";
$result = $conn->query($sql);

if ($result->num_rows > 2) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //muntahin dulu idnya buat apus
	echo  '<input type="hidden" name="arridurl[]" value="'.$row["id_url"].'">';
	  
	//inisiasi varibel
	$id_url[] = $row["id_url"]; //unik
  }
} else {
  echo "<h1><mark>SOFT KURANG";die();
}


//ambil hard
$sql = "SELECT * FROM hinata18_tampung_sementara WHERE tipe='hard' AND status='perawan' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	//muntahin dulu idnya buat apus
	echo  '<input type="hidden" name="arridurl[]" value="'.$row["id_url"].'">';
	  
	//inisiasi varibel untuk array
	$id_url[] = $row["id_url"]; //unik
  }
} else {
  echo "<h1><mark>HARD KURANG";die();
}

//gabungin array dng \n
$array_susun = implode("\n",$id_url);
?>



	
	
	  <p>      
		  <label class="w3-text-red"><b>Daftar Menu</b></label><br/>
		  <textarea class="w3-input w3-border" rows="10"><? echo $array_susun; #printout array ?></textarea>
	  </p>
	  <p>      
		<button class="w3-btn w3-red w3-block">GO-EXECUTE!</button>
	  </p>
	</form>
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