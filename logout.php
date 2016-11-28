<!--
Prolog: logout.php
Purpose: Code that deletes the login coockie
Preconditions: Nothing
Postconditions: The user does not have a login coockie
-->
<?php
if (isset($_COOKIE['login'])) { 
// if the user is has a logoin cookie, it erases the cookie and sets it
// expire in the past, so that the cookie will expire immediately                                
	setcookie('login', '', -1, "/");
}
header('location:login.php');
?>
