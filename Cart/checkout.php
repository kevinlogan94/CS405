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
    <title>Checkout</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Checkout</h1>
     <h2>Order Information</h2>
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

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }
	//Get sum of price and salesprice
	$sql = "select SUM(product.Price) as Price, SUM(product.SalesPrice) as SalesPrice, SUM(InvoicePrice) as InvoiceTotal 
                from orderContainProduct as o, userOrder, product, orders 
                where o.OrderID=userOrder.OrderID 
                and product.ProductID=o.ProductID 
                and orders.OrderID=o.OrderID 
                and orders.OrderStatus='UnCheckout'
                and UserID=" . $_COOKIE['login'] . ";";
        $result = $conn->query($sql);
	$data = $result->fetch_assoc();
	//If sales price sum is 0 print PriceSum otherwise add each individual product 
	//together based on SalesPrice or Price
	$InvoiceTotal = number_format($data["InvoiceTotal"], 2, '.', '');
	if($data["SalesPrice"] == 0){
		$OrderTotal = number_format($data["Price"], 2, '.', '');
	}
	else{
		$sql = "select Price, SalesPrice, InvoicePrice 
                from orderContainProduct as o, userOrder, product, orders 
                where o.OrderID=userOrder.OrderID 
                and product.ProductID=o.ProductID 
                and orders.OrderID=o.OrderID 
                and orders.OrderStatus='UnCheckout'
                and UserID=" . $_COOKIE['login'] . ";";
        	$result = $conn->query($sql);
		$OrderTotal=0;
		while($row = $result->fetch_assoc()) {
			if($row["SalesPrice"] == 0){
				$OrderTotal += $row["Price"];
			}
			else{
				$OrderTotal += $row["SalesPrice"];
			}
	        }
		$OrderTotal = number_format($OrderTotal, 2, '.', '');
	}
	//Print out the order total
        echo "<p>OrderTotal: $OrderTotal</p>";
	
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
		$OrderID = $row["OrderID"];
          }
        } else {
           echo "<br>Your Cart is empty<br>";
        }
        
	$conn->close();
     ?>
     </tbody>
     </table>

     <!--Address Table-->
     <table>
     <thead>
       <th>Address</th>
       <th>City</th>
       <th>Zip</th>
     </thead>
     <tbody>
       <tr>
         <td>320 East Maxwell St.</td>
	 <td>Lexington</td>
	 <td>KY</td>
       </tr>
     </tbody>
     </table>     

     <!--Card information table-->
     <table>
     <thead>
       <th>Card</th>
       <th>Card Name</th>
       <th>Expiration</th>
     </thead>
     <tbody>
       <tr>
	 <td>123456789</td>
	 <td>John M Doe</td>
	 <td>11/11/2020</td>
       </tr>
     </tbody>
     </table>
      <form action="/CS405/Cart/procCheckout.php" method='post'>
	<input type="Hidden" name='OrderTotal' value=" <?php echo $OrderTotal ?> " />
	<input type="Hidden" name='OrderID' value=" <?php echo $OrderID ?> " />
	<input type="Hidden" name='InvoiceTotal' value=" <?php echo $InvoiceTotal ?> " />
        <input type="submit" value="Complete Checkout" />
      </form>
</body>
</html>
