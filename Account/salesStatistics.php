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

        $sql = "select max(OrderTotal) from orders where OrderStatus='Pending' or OrderStatus='Shipping';";
        $result = $conn->query($sql);
	$data = $result->fetch_assoc();
        echo "<p>Most revenue from a single order: $" . $data["max(OrderTotal)"] . "</p>";

	$sql = "select sum(OrderTotal) from orders where OrderStatus='Pending' or OrderStatus='Shipping';";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        echo "<p>Total revenue from all purchases: $" . $data["sum(OrderTotal)"] . "</p>"; 

        

	$conn->close();
     ?>
     <div id="footer"></div>
  </body>
</html>




