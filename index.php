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
       Enter your search <input type="text" name="searchBar"><br>
       <input type="submit" value="Submit">
     </form>
     <?php
      $servername = "penstemon.cs.engr.uky.edu";
      $username = "kmlo225";
      $password = "u0697747";
      $dbname = "myDB";
      
      $conn = new mysqli($servername, $username, $password);

      if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
      } 
      // Create database
      $sql = "CREATE DATABASE myDB";
      if ($conn->query($sql) === TRUE) {
       echo "Database created successfully";
      } 
      else {
        echo "Error creating database: " . $conn->error;
      }
      
      $conn->close();

      // Create connection
      /*$conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT id, firstname, lastname FROM MyGuests";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      }
      } 
      else {
       echo "0 results";
      }

      mysqli_close($conn);*/
     ?>  
     <div id="footer"></div> 
  </body> 
</html>
