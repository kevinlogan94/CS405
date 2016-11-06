<?php
$ProductID = $_POST['ProductID'];
$SalePrice = $_POST['SalePrice'];

echo $ProductID;
echo $SalePrice;

include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "update Product
	set (...) 
        where ProductID='" . $ProductID ."';";
echo $sql;

// perform the query
//$conn->query($sql);


//header('location:pendingorders.php');

?>
