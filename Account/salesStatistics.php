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
    <title>Sales Statistics</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Sales Statistics</h1>
     <?php
        include '../databaselogin.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

	//Most revenue from single order
        $sql = "select max(OrderTotal) from orders where OrderStatus='Pending' or OrderStatus='Shipping';";
        $result = $conn->query($sql);
	$data = $result->fetch_assoc();
	$maxOrderTotal = number_format($data["max(OrderTotal)"], 2, '.', '');
        echo "<p>Most revenue from a single order: $" . $maxOrderTotal . "</p>";

	//Get Total Revenue
	$sql = "select sum(OrderTotal) from orders where OrderStatus='Pending' or OrderStatus='Shipping';";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
	$sumOrderTotal = number_format($data["sum(OrderTotal)"], 2, '.', '');
        echo "<p>Total revenue from all purchases: $" . $sumOrderTotal . "</p>"; 
	
	//Get most sold Product
	$sql = "select ProductName, SUM(o.Amount) as Amount 
		from orderContainProduct as o, product, orders 
		where product.ProductID=o.ProductID 
		and orders.OrderID=o.OrderID 
		and OrderStatus<>'UnCheckout' 
		group by ProductName 
		order by Amount 
		DESC Limit 1;";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        echo "<p>Most sold product: " . $data["ProductName"] . " <br>with amount: " . $data["Amount"] . "</p>";

	//get all orders of status pending or shipping
	$sql = "select * from orders 
                where OrderStatus<>'UnCheckout';";
        $result = $conn->query($sql);

	//Get products
	$productSql = "select product.ProductName, orders.OrderID, o.Amount 
                       from product, orderContainProduct as o, orders
                       where OrderStatus<>'UnCheckout'
                       and orders.OrderID=o.OrderID
                       and product.ProductID=o.ProductID
                       order by orders.OrderID;";

        $productResult = $conn->query($productSql);
        $prodData = $productResult->fetch_assoc();


	 echo "<h2>Orders</h2>
                <table>
                  <thead>
                    <th>OrderID</th>
                    <th>OrderStatus</th>
		    <th>Products(Amount)</th>
                    <th>OrderTotal</th>
                    <th>OrderDate</th>
                    <th>ShipDate</th>
                  </thead>
                <tbody>";

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["OrderID"] . "</td>";
                echo "<td>" . $row["OrderStatus"] . "</td>";
		echo "<td>";
		while($prodData["OrderID"] == $row["OrderID"]){
                        echo $prodData["ProductName"] . " (". $prodData["Amount"]  .")  <br>";
                        $prodData = $productResult->fetch_assoc();
                }
		echo "</td>";
                echo "<td>" . $row["OrderTotal"] . "</td>";
                echo "<td>" . $row["OrderDate"] . "</td>";
                echo "<td>" . $row["ShipDate"] . "</td>";
                echo "</tr>";
        }
        } else {
           echo "You don't have any Orders";
        }
       
	 echo "</tbody>
              </table>";

	$conn->close();
     ?>
     <div id="footer"></div>
  </body>
</html>
