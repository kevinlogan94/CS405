<!--
Prolog: Header.html
Purpose: Allow us to include a header at the top of every page of the website.
Preconditions: Click the helpfinder.us on the top left. Click the For Nonprofits button on the top right, opening a dropdown box.
	Click the login or register button from the dropdown box.
Postconditions: Page transition to the landing page, registration page, or login page depending on what button you press.  
-->

<!DOCTYPE html>
<html>
<head>
 <!--set the tab name to Help Finder-->
  <title>Amazon CS405 Project</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!--HTML setup-->
<ul>
  <li><a class="active" href="index.php">Amazon</a></li>
  <li class="dropdown">
    <a class="dropbtn" onclick="myFunction()">Your Account</a>
    <div class="dropdown-content" id="myDropdown">
      <a href="login.php">Login</a>
      <a href="register.php">Register</a>
      <a href="index.php">Dashboard</a>
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


