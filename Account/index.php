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
    <title>Account Information</title>
  </head>
<body>
<div id="header"></div>
  <table>
  <thead>
    <th>Username</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    <th>Class</th>
    <th>UserID</th>
  </thead>
  <tbody>
<?php
	$cookie_name = 'login';
	if(!isset($_COOKIE[$cookie_name])) {
 	   echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "<h1>" . "Welcome User: " . $_COOKIE[$cookie_name] . "</h1>";
}
	include '../databaselogin.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from user where UserID='" . $_COOKIE[$cookie_name] . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["FirstName"] . "</td>";
		echo "<td>" . $row["LastName"] . "</td>";
		echo "<td>" . $row["Email"] . "</td>";
		echo "<td>" . $row["Class"] . "</td>";
		echo "<td>" . $row["UserID"] . "</td>";
                echo "</tr>";

		$Class=$row["Class"];
        }
        } else {
           echo "0 results";
        }

        $conn->close();

	if($Class == "Manager"){
		echo "<a href='/CS405/Account/inventory.php'>Inventory</a>, ";
		echo "<a href='/CS405/Account/pendingorders.php'>Pending Orders</a>, ";
		echo "<a href='/CS405/Account/orderhistory.php'>Order History</a>, ";
		echo "<a href='/CS405/Account/salesStatistics.php'>Sales Statistics</a>, ";
		echo "<a href='/CS405/Account/salesPromotion.php'>Sales Promotion</a><br><br>";
	}
        else if($Class == "Staff"){
		echo "<a href='/CS405/Account/inventory.php'>Inventory</a>, ";
                echo "<a href='/CS405/Account/pendingorders.php'>Pending Orders</a>, ";
                echo "<a href='/CS405/Account/orderhistory.php'>Order History</a><br><br>";
	}
	else{
                echo "<a href='/CS405/Account/orderhistory.php'>Order History</a><br><br> ";
        }
?>
   </tbody>
   </table>
<div id="footer"></div>
</body>
</html>
