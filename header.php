<!--
Prolog: Header.html
Purpose: Allow us to include a header at the top of every page of the website.
Preconditions: Click the helpfinder.us on the top left. Click the For Nonprofits button on the top right, opening a dropdown box.
        Click the login or register button from the dropdown box.
Postconditions: Page transition to the landing page, registration page, or login page depending on what button you press.  
-->

<!DOCTYPE html>
<?php
	// checks to see if the user is logged in. If they are, the login button is replaced by a logout button
$logged_in = False;
if (isset($_COOKIE['login'])) {
    $logged_in = True;
}
// checks to see if any alerts have been created and if so, it displays them
session_start();
if (!empty($_SESSION['alert'])) {
echo "<script language='javascript'>";
echo "alert(\"".$_SESSION['alert']."\")";  //not showing an alert box.
echo "</script>";
unset($_SESSION['alert']);
}


?>


<html>
<head>
 <!--set the tab name to Help Finder-->
  <title>Amazon CS405 Project</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!--HTML setup-->
<ul>
  <li><a id='homeButt' class="active" href="index.php">Web Store Project</a></li>
  <li class="dropdown">
    <a class="dropbtn" onclick="myFunction()">Your Account</a>
    <div class="dropdown-content" id="myDropdown">
      <?php
        if ($logged_in) 
	{ 
	  echo "<a href='logout.php'>Logout</a>";
	  echo "<a href='accountinfo.php'>Account Info</a>";
	  echo "<a href='cart.php'>Cart</a>";
	}
	else {
	  echo "<a href='login.php'>Login</a>"; 
	  echo "<a href='register.php'>Register</a>";  
	}
      ?>
    </div>
  </li>
</ul>

<script>
//Javascript
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
