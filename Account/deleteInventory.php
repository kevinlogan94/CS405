<?php
$ProductID = $_POST['ProductID'];

include '../databaselogin.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "delete from product
	where ProductID=$ProductID;";

$conn->query($sql);
$conn->close();

header('location:inventory.php');
?>
