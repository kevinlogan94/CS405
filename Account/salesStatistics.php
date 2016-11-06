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
     <h2>Replace with sales statistics</h2>
     <table>
     <thead>
       <th>UserID</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Class</th>
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

        $sql = "select * from user;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
	   echo "<tr>";
	   echo "<td>" . $row["UserID"] . "</td>";
           echo "<td>" . $row["FirstName"] . "</td>";
	   echo "<td>" . $row["LastName"] . "</td>";
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
     <div id="footer"></div>
  </body>
</html>




