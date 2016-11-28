<!--
Prolog: access.php
Purpose: Code that handles the login process
Preconditions: Gets input of a username/email and password
Postconditions: If the information is correct, creats login cookie and redirect to dashboard. otherwise return with error.
-->


<?php
// Create connection
include 'databaselogin.php';
$conn = new mysqli($servername, $username, $password, $db);

$username = $_POST['username'];
$password = $_POST['password'];

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      //print nl2br("Database NOT Found.\n");
}



// Find any account where the username or email match the password

$sql = "SELECT * FROM user 
	WHERE (Username = " . "'$username'" . " OR Email = '" . "$username" . "') AND (Password = '" . $password . "');";
//echo $sql;


$result = $conn->query($sql);

// if there is a match, get array from query result, then use the username 
// and secret word to create a "login" cookie for 3 hours. 
if ($result->num_rows > 0)
    {
	$sql = "select * from user
		where Username ='" . $username . "' and Password='" . $password . "';";
        //echo $sql;
	$result = $conn->query($sql);
	$data = $result->fetch_assoc(); 
	$userID = $data['UserID'];
        setcookie('login', $userID, time() + (86400 * 30), "/");
        header('location:/CS405/Account/');
    }
else // return to login page with error message
    {
	session_start();
    	$_SESSION['login_error_msg'] = "Wrong username/email or password";
	header('location:login.php');
    }

?>
