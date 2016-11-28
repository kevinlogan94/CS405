<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
    <script> 
    $(function(){
      $("#header").load("../../header.php");
      $("#footer").load("../../footer.php"); 
    });
    </script> 
    <title>VIP Account</title>
  </head>
  <body>
     <div id="header"></div>
     <h1>VIP Account</h1>
     <h3>Current products in the VIP store</h3>
     <table>
       <thead>
         <th>ID</th>
         <th>Product</th>
         <th>Category</th>
         <th>Price</th>
         <th>Invoice Price</th>
         <th>Sales Price</th>
         <th>Amount</th>
         <th>Delete</th>
       </thead>
       <tbody>
     <?php
        include '../../databaselogin.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from product where VIP=1;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
	   echo "<tr>";
	   echo "<td>" . $row["ProductID"] . "</td>";
           echo "<td>" . $row["ProductName"] . "</td>";
	   echo "<td>" . $row["Category"] . "</td>";
           echo "<td>" . $row["Price"] . "</td>";
	   echo "<td>" . $row["InvoicePrice"] . "</td>";
	   echo "<td>" . $row["SalesPrice"] . "</td>";
	   echo "<td>" . $row["Amount"] . "</td>";
           echo "<td><form action='editVipProduct.php' method='post'><input type='hidden' name='ProductID' value=" . $row["ProductID"] . " /><input type='submit' value='Delete' /></form></td>";
	   echo "</tr>";
	}	
	} else {
           echo "0 results";
	}
	?>
	</tbody>
        </table>
	<h3>Products Available</h3>
        <table>
         <thead>
          <th>ID</th>
          <th>Product</th>
          <th>Category</th>
          <th>Price</th>
          <th>Invoice Price</th>
          <th>Sales Price</th>
          <th>Amount</th>
          <th>Add</th>
         </thead>
        <tbody>	
	<?php        
	$sql = "select * from product where VIP=0;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo "<td>" . $row["ProductID"] . "</td>";
           echo "<td>" . $row["ProductName"] . "</td>";
           echo "<td>" . $row["Category"] . "</td>";
           echo "<td>" . $row["Price"] . "</td>";
           echo "<td>" . $row["InvoicePrice"] . "</td>";
           echo "<td>" . $row["SalesPrice"] . "</td>";
           echo "<td>" . $row["Amount"] . "</td>";
           echo "<td><form action='editVipProduct.php' method='post'><input type='hidden' name='ProductID' value=" . $row["ProductID"] . " /><input type='submit' value='Add' /></form></td>";
           echo "</tr>";
        }
        } else {
           echo "0 results";
        }


        $conn->close();
     ?>
     </tbody>
     </table>
     <div id="footer"></div>
  </body>
</html>




