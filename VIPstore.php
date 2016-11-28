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
    <title>VIP Store</title>
  </head>
  <body>
     <div id="header"></div>
     <h1> Welcome to the VIP Store</h1>
     <form action="search_product.php">
       <input type='hidden' name='VIP' value="true" />
       &nbsp; Search for Product: &nbsp;&nbsp; <input type="text" name="searchBar" size="45px" placeholder="Enter the Name or Category (Game or Book)"><br>
       &nbsp; <input type="submit" value="Submit">
     </form>
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

        $sql = "select * from product where VIP=1;";
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
 //	include 'apicall.php' 
    ?>
     </tbody>
     </table>
  <div id="footer"></div>
  </body>
</html>


