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
    <title>Search Results</title>
  </head>
  <body>
    <div id="header"></div>
     <h1>Search Results</h1>
     <table>
     <thead>
       <th>Image</th>
       <th>Name</th>
       <th>Category</th>
       <th>Price</th>
       <th>Sales Price</th>
       <th>Amount</th>
       <th>Description</th>
       <th>Add to Cart</th>
     </thead>
     <tbody>
<?php
$searchText = $_GET['searchBar'];

include 'databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

 $sql = "select * 
        from product
        where ProductName='" . $searchText ."'
        or Category='" . $searchText ."';";
echo "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 	while($row = $result->fetch_assoc()) {
	   if($row["Category"] == "Game"){
   		$imgsource = "Images/game.jpg";
	   }
	   else if($row["Category"] == "Book"){
   		$imgsource = "Images/book.jpg";
	   }

	   echo "<tr>";
           echo "<td> <img src=" . $imgsource . "></img></td>";
           echo "<td>" . $row["ProductName"] . "</td>";
           echo "<td>" . $row["Category"] . "</td>";
           echo "<td>" . $row["Price"] . "</td>";
           echo "<td>" . $row["SalesPrice"] . "</td>";
           echo "<td>" . $row["Amount"] . "</td>";
           echo "<td>" . $row["ProdDescripiton"] . "</td>";
           echo "<td><form action='addToCart.php' method='post'><input type='hidden' name='ProductID' value=" . $row["ProductID"] . " /><input type='submit' value='Add to Cart' /></form></td>";
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

