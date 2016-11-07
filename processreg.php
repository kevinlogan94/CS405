<!--
Prolog: processreg.php
Purpose: Code that handles sumission of the of the registation page
Preconditions: Registation form was submitted successfully
Postconditions: If the username and email are not taken, the account is added to the database. 
Otherwise returns with an error message.
-->
<?php
 include 'databaselogin.php';

 // Create connection
 $conn = new mysqli($servername, $username, $password, $db);

 // Check connection
 if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 }

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class = $_POST['class'];
//$phone = $_POST['phone'];

 //Get the userid for the insertion.
 $sql = "select max(UserID) from user;";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $userid = $row["max(UserID)"];
 $userid++;
 


//CODE FOR TESTING PURPOSES
/* 
 $sql = "select * from user;";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
       echo "Firstname: " . $row["FirstName"]. " - Lastname: " . $row["LastName"]. " " . $row["Username"]. "<br>";
 }
 } else {
       echo "0 results";
 }
*/

$createuser = "insert into user 
                values ('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $class . "', '" . $password . "', '" . $username . "', '" .  $userid . "');";

//perform insertion 
//echo $createuser;
$conn->query($createuser);

$conn->close();

//transition to login page.
header('location:login.php');
?>



