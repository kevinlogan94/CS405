<?php
$OrderID = $_POST['OrderID'];
echo $OrderID;

// Create connection
include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

//check order if the products are able to be sent.

$sql = "Select to find if products in inventory are available;";
echo $sql;
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "update order set Status='Shipping'
          where OrderID='" . $OrderID . ";";
    echo $sql;

   //perform the query
   // $conn->query($sql);   
} else {
    session_start();
    $_SESSION['alert'] = "Update Failed: List of products that cause the issue.";
    //Directions say to go to another page.
}

header('location:pendingorders.php');
?>
