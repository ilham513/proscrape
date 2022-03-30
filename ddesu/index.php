<!DOCTYPE html>
<html>
<title>INDEX</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container"><br/>
<form class="w3-container w3-card-4" action="go.php" method="post">
  <h2 class="w3-text-blue">Input </h2>
  <p>      
  <label class="w3-text-blue"><b>Judul</b></label>
  <input class="w3-input w3-border" name="judul" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Tipe</b></label><br/>
	<input class="w3-radio" type="radio" name="tipe" value="komik" checked>
	<label>Komik</label>
	<input class="w3-radio" type="radio" name="tipe" value="ilustrasi">
	<label>Ilustrasi</label>
	<input class="w3-radio" type="radio" name="tipe" value="shorts">
	<label>Shorts</label>
  </p>
  <p>      
  <label class="w3-text-blue"><b>Gambar</b></label>
  <input class="w3-input w3-border" name="gambar" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Sinopsis</b></label>
  <input class="w3-input w3-border" name="sinopsis" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Link</b></label>
  <input class="w3-input w3-border" name="link" type="text"></p>
  <p>      
  <label class="w3-text-blue"><b>Money?</b></label><br/>
	<input class="w3-radio" type="radio" name="money" value="false" checked>
	<label>No</label>
	<input class="w3-radio" type="radio" name="money" value="true">
	<label>YE$</label>
  </p>
  <p>      
  <button class="w3-btn w3-blue">GO</button></p>
</form>
</div>

</body>
</html> 