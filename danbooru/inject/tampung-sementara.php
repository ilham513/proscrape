<body bgcolor="white">
<?
//inisiasi variabel
$url = $_GET['url'];
$tipe = $_GET['tipe'];
$callback = $_GET['callback'];




//include koneksi
include('../koneksi.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO hinata18_tampung_sementara (id_url,tipe,status)
VALUES ('$url', '$tipe', 'perawan')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<hr><h1>" . $conn->error . "</h1><hr>";
  echo '
<p>You will be redirected in <span id="counter">10</span> second(s). <a href=" '.$callback.' ">Or Click Here</a></p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById("counter");
    if (parseInt(i.innerHTML)<=0) {
        location.href = "'.$callback.'";
    }
if (parseInt(i.innerHTML)!=0) {
    i.innerHTML = parseInt(i.innerHTML)-1;
}
}
setInterval(function(){ countdown(); },1000);
</script>
  ';
  die();
}








echo '<meta http-equiv="refresh" content="1; URL='.$callback.'" />';