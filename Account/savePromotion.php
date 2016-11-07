<?php
$ProductID = $_POST['ProductID'];
$SalesPrice = $_POST['SalesPrice'];

include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "update product
	set SalesPrice=" . $SalesPrice . "
        where ProductID='" . $ProductID ."';";

// perform the query
$conn->query($sql);

header('location:salesPromotion.php');

?>
