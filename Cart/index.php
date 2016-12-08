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
    <title>Cart</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Cart</h1>
     <h3>If Sales Price isn't 0, it replaces the price section for the product.</h3>
     <table>
     <thead>
       <th>Product</th>
       <th>Category</th>
       <th>Price</th>
       <th>Amount</th>
     </thead>
     <tbody>
     <?php
        include '../databaselogin.php';
	$checkoutCtr = 0;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
 
	$sql = "select Price, ProductName, SalesPrice, o.OrderID, Category, o.Amount 
		from orderContainProduct as o, userOrder, product, orders 
		where o.OrderID=userOrder.OrderID 
		and product.ProductID=o.ProductID 
		and orders.OrderID=o.OrderID 
		and orders.OrderStatus='UnCheckout'
		and UserID=" . $_COOKIE['login'] . ";";	
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ProductName"] . "</td>";
                echo "<td>" . $row["Category"] . "</td>";
		if($row["SalesPrice"] != 0){
		  echo "<td>" . $row["SalesPrice"] . "</td>";
		}
		else {
		  echo "<td>" . $row["Price"] . "</td>";
		}
		echo "<td>" . $row["Amount"] . "</td>";
                echo "</tr>";
        }
        } else {
	   $checkoutCtr++;
           echo "<br>Your Cart is empty<br>";
        }

        $conn->close();
     ?>
     </tbody>
     </table>
     <?php
	if($checkoutCtr == 0) {
		echo "<form action='/CS405/Cart/checkout.php'>
      		      <input type='submit' value='Checkout' />
     		      </form>";
	}

?>
     <div id="footer"></div>
  </body>
</html>
