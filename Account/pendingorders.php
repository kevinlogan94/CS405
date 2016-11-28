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
    <title>Pending Orders</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Ship Pending Orders</h1>
     <table>
     <thead>
       <th>OrderID</th>
       <th>Status</th>
       <th>Customer</th>
       <th>Purchased(Amount)</th>
       <th>Order Total</th>
       <th>Created</th>
       <th>Ship</th>
       
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
	
	$productSql = "select product.ProductName, orders.OrderID, o.Amount 
		       from product, orderContainProduct as o, orders
		       where OrderStatus='Pending'
		       and orders.OrderID=o.OrderID
                       and product.ProductID=o.ProductID
		       order by orders.OrderID;";

	$productResult = $conn->query($productSql);
	$prodData = $productResult->fetch_assoc();

/*
        $sql = "select OrderID 
		from orders, userOrder, user, product, orderContainProduct as o   
		where OrderStatus='Pending'
		and orders.OrderID=userOrder.OrderID
		and userOrder.UserID=user.UserID
		and orders.OrderID=o.OrderID
		and product.ProductID=o.ProductID;";
*/
        $sql = "select * 
                from orders, userOrder, user   
                where OrderStatus='Pending'                
		and orders.OrderID=userOrder.OrderID
                and userOrder.UserID=user.UserID;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["OrderID"] . "</td>";
                echo "<td>" . $row["OrderStatus"] . "</td>";
		echo "<td>" . $row["FirstName"] . " " . $row["LastName"] . "</td>";
		echo "<td>";
		while($prodData["OrderID"] == $row["OrderID"]){
			echo $prodData["ProductName"] . " (" . $prodData["Amount"] . ") <br>";
			$prodData = $productResult->fetch_assoc();
		}
		echo "</td>";
		echo "<td>" . $row["OrderTotal"] . "</td>";
		echo "<td>" . $row["OrderDate"] . "</td>";
		echo "<td><form action='updatePendingOrder.php' method='post'><input type='hidden' name='OrderID' value=" . $row["OrderID"] . " /><input type='submit' value='Ship' /></form></td>";
                echo "</tr>";
        }
        } else {
           echo "There are 0 pending orders";
	}

//For testing purposes
//	echo "<td><form action='updatePendingOrder.php' method='post'><input type='hidden' name='OrderID' value=" . "1" . " /><input type='submit' value='Ship' /></form></td>";	
        $conn->close();
     ?>
     </tbody>
     </table>

     <div id="footer"></div>
  </body>
</html>
