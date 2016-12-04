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
     <form action="search_product.php">
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

    ?>
     </tbody>
     </table>

     <h3>Available accounts to sign into:</h3>
     <table>
     <thead>
       <th>Username</th>
       <th>Password</th>
       <th>Class</th>
     </thead>
     <tbody>
     <?php
	$sql = "select * from user;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
        // output data of each row
   	 while($row = $result->fetch_assoc()) {
        	echo "<tr>";
		echo "<td>" . $row["Username"] . "</td>"; 
	        echo "<td>" . $row["Password"] . "</td>";
		echo "<td>" . $row["Class"] . "</td>";
		echo "</tr>";
    	}
	} else {
 	   echo "0 results";
	}

        $conn->close();
    ?>
     </tbody>
     </table>
     <h3>Partner Database Extra Credit</h3>
     <form action="apicall.php">
       &nbsp;<input type="submit" value="Update with Partner Database">
     </form>

  <div id="footer"></div>
  </body>
</html>


