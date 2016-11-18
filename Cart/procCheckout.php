<?php
// Create connection
include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

$OrderID = $_POST["OrderID"];
$OrderTotal = $_POST["OrderTotal"];
$InvoiceTotal = $_POST["InvoiceTotal"];

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "update orders
	set OrderTotal=$OrderTotal, InvoiceTotal=$InvoiceTotal, OrderDate=CurDate(), OrderStatus='Pending' 
        where OrderID=$OrderID;";
echo $sql;

// perform the query
$conn->query($sql);

//alert the user and send them to home page.
session_start();
$_SESSION['alert'] = "Checkout Complete!";
header('location:../index.php');

?>
