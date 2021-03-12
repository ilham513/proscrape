<? include('../koneksi.php'); #KONEKSI

$arridurl = $_POST['arridurl'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




foreach($arridurl as $arridurl){
	$sql = "UPDATE hinata18_tampung_sementara SET status='JEBOL' WHERE id_url='$arridurl'";

	if ($conn->query($sql) === TRUE) {
	  echo "<mark>Record updated successfully</mark><hr/>";
	} else {
	  echo "Error updating record: " . $conn->error;
	}
}

header('Location: index.php');