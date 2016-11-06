<?php
$ProductID = $_POST['ProductID'];
$Amount = $_POST['Amount'];

echo $ProductID;
echo $Amount;

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
