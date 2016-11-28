<?php
$Category = $_POST['Category'];
$ProductName = $_POST['ProductName'];
$Price = $_POST['Price'];
$InvoicePrice = $_POST['InvoicePrice'];
$ProdDescription = $_POST['Description'];
$Amount = $_POST['Amount'];


include '../databaselogin.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "select max(ProductID) as id
	from product;";

$result = $conn->query($sql);
$data = $result->fetch_assoc();
$newID = $data['id'];
$newID++;


$sql = "Insert into product
	values($newID, '$ProductName', $Price, $InvoicePrice, 0, '$Category', '$ProdDescription', $Amount, 0);";
$result = $conn->query($sql);

$conn->close();

header('location:inventory.php');
?>
