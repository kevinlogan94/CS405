<?php
// Create connection
include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into order 
        values (...);";
echo $sql;

// perform the query
//$conn->query($sql);

//alert the user and send them to home page.
session_start();
$_SESSION['alert'] = "Checkout Complete! Kind of...";
header('location:../index.php');

?>
