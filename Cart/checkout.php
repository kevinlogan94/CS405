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
     <form action="/CS405/Cart/procCheckout.php">
        <input type="submit" value="Complete Checkout" />
      </form>
     <h2>Order Information</h2>
     <table>
     <thead>
       <th>Product</th>
       <th>Class</th>
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

        $sql = "select * from order where OrderID='" . $_COOKIE[$cookie_name] . "';";
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Product"] . "</td>";
                echo "<td>" . $row["Class"] . "</td>";
                echo "<td>" . $row["Amount"] . "</td>";
                echo "</tr>";
        }
        } else {
           echo "<br>Your Cart is empty<br>";
        }

        $conn->close();
     ?>
     <table>
     <thead>
       <th>Address</th>
       <th>City</th>
       <th>Zip</th>
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

        $sql = "select * from order where OrderID='" . $_COOKIE[$cookie_name] . "';";
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>" . $row["City"] . "</td>";
                echo "<td>" . $row["Zip"] . "</td>";
                echo "</tr>";
        }
        } else {
           echo "<br>Your Address isn't in the system<br>";
        }

        $conn->close();
     ?>

     <table>
     <thead>
       <th>Card</th>
       <th>Card Name</th>
       <th>Expiration</th>
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

        $sql = "select * from order where OrderID='" . $_COOKIE[$cookie_name] . "';";
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Card"] . "</td>";
                echo "<td>" . $row["Card Name"] . "</td>";
                echo "<td>" . $row["Expiration"] . "</td>";
                echo "</tr>";
        }
        } else {
           echo "<br>Your Card isn't in the system<br>";
        }

        $conn->close();
     ?>
</body>
</html>


