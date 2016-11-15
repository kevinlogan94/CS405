<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
    <script> 
    $(function(){
      $("#header").load("header.php");
      $("#footer").load("footer.php"); 
    });
    </script> 
    <title>CS405 Project</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>Welcome to the Home page</h1>
     <form action="demo_form.asp">
       Enter your search: <input type="text" name="searchBar" placeholder="This doesn't do anything yet"><br>
       <input type="submit" value="Submit">
     </form>
     <h2>Notes for Add product to Cart Setup:</h2>
     <p>When the product page is set up you need to have a button called "Add to Cart" that which is the submit button of a form to<br> 
	another php file. This php file will add the product to the cart. In order to do this you need to do something specific based off what<br>
	I've done so far. DO<br>
	IF(There is an order with OrderStatus='UnCheckout' connected to the UserID of the person logged in){<br>
		&nbsp;If(The product is already there){<br>
			&emsp;&emsp; Increase the amount<br>
		&nbsp;}<br>
		&nbsp;else{<br>
			&emsp;&emsp; add the ProductID to the orderContainProduct table with Amount=1 for that same OrderID.<br>
		&nbsp;}<br>
	&nbsp;}<br>
	&nbsp;Else{<br>
		&emsp;&emsp;Insert a new OrderID with OrderStatus='UnCheckout'<br>
		&emsp;&emsp;then add the ProductID to the orderContainProduct table with Amount=1 for that same OrderID.<br>
		&emsp;&emsp;NOTE:For deciding the new OrderID I would do Max(OrderID) and just increment it.<br>
	&nbsp;}<br>
		
		</p>
     <h2>Notes for checkout:</h2>
     <p>All the really needs to be done for this is that you need to update the OrderStatus to OrderStatus='Pending'. You also need to update<br>
	the OrderDate. You can easily do OrderDate=CurDate() in the query.
     </p>


     <h1>Products</h1>
     <table>
      <thead>
       <th>Product</th>
     </thead>
     <tbody>
     <?php
        include 'databaselogin.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from product;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
		echo "<td><form action='product.php' method='post'><input type='hidden' name='ProductID' value=" . $row["ProductID"] . " /><input type='submit' value='" . $row["ProductName"] . "' /></form></td>";
		echo "</tr>";
        }
        } else {
           echo "0 results";
        }

        $conn->close();
    ?>
     </tbody>
     </table>

     <h3>Available accounts to sign into:</h3>
     <table>
     <thead>
       <th>Username</th>
       <th>Password</th>
     </thead>
     <tbody>
     <?php
	include 'databaselogin.php';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "select * from user;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
        // output data of each row
   	 while($row = $result->fetch_assoc()) {
        	echo "<tr>";
		echo "<td>" . $row["Username"] . "</td>"; 
	        echo "<td>" . $row["Password"] . "</td>";
		echo "</tr>";
    	}
	} else {
 	   echo "0 results";
	}

        $conn->close();
 //	include 'apicall.php' 
    ?>
     </tbody>
     </table>
  <div id="footer"></div>
  </body>
</html>


