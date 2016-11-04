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
     <p>Available accounts to sign into:</p>
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
     ?>
     </tbody>
     </table>
     <div id="footer"></div>
  </body>
</html>


