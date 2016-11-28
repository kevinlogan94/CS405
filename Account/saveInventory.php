<?php
$ProductID = $_POST['ProductID'];
$Amount = $_POST['Amount'];

include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "update product
	set Amount=" . $Amount . " 
        where ProductID=" . $ProductID .";";
echo $sql;

// perform the query
$conn->query($sql);


header('location:/CS405/Account/inventory.php');

?>
