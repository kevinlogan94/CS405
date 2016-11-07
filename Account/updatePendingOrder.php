<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
    <script> 
    $(function(){
      $("#header").load("../header.php");
      $("#footer").load("../footer.php"); 
    });
    </script> 
    <title>Update Status Fail</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Update Status Failed!</h1>
     <h2>Products that aren't in stock</h2>

<?php
$OrderID = $_POST['OrderID'];

// Create connection
include '../databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

//Get the amount of products in the order
$sql = "select count(ProductName) from orderContainProduct, product where orderContainProduct.ProductID=product.ProductID and OrderID=" . $OrderID . ";";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$amount = $data['count(ProductName)'];
//echo $amount;


//check order if the products are able to be sent.
$sql = "select ProductName, product.ProductID 
        from orderContainProduct, product 
        where Amount > 0 and orderContainProduct.ProductID=product.ProductID and OrderID=" . $OrderID . ";";
$result = $conn->query($sql);

//compare what can be sent to how many are in the order.
if ($result->num_rows == $amount) {
    //Set the order status to Shipping
    $sql = "update orders set OrderStatus='Shipping'
          where OrderID=" . $OrderID . ";";

   //perform the query
    $conn->query($sql);

    while($row = $result->fetch_assoc()) {
      //Reduce the amount of each product
      $sql = "update product set Amount=(Amount-1)
              where ProductID=" . $row["ProductID"] . ";";
      $conn->query($sql);
    }


    header('location:pendingorders.php');
} else {//Otherwise print what's not listed
    $sql = "select ProductName 
        from orderContainProduct, product 
        where product.Amount < 1 and orderContainProduct.ProductID=product.ProductID and OrderID=" . $OrderID . ";";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
      echo $row["ProductName"] . " ";
    }
}

?>
    <div id="footer"></div>
  </body>
</html>
