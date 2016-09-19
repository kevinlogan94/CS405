<!--
Prolog: login.php
Purpose: Page that allows a user to log in to their created account or go to password recovery page.
Preconditions: Input a username and password, then submit. Otherwise click I forgot my password.
Postconditions: User is transitioned into their own personal user dashboard. Otherwise transitioned
	to the password recovery page.
-->

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <!--MOBILE--> 
  <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  <!--REQUIRED FOR HEADER-->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="formValidation.js"></script>
  <script>$(function(){
  $("#header").load("header.php"); });
  </script>
</head>
<body>

<!--REQUIRED FOR HEADER-->
<div id="header"></div>

<!--Set up form for login information-->
<div class="box">
 <h1>Login</h1>
 <form name = "myform" action="access.php" method="post" onsubmit="return loginValidateForm()">
  <fieldset>
  <p id="formerror"></p>
  <hr>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="username" placeholder="Username"><br>
  <label id="icon" for="name"><i class="icon-key"></i></label>
  <input type="password" name="password" placeholder="Password"><br><br>
  <input type="submit" value="Submit"><br><br>
    <!--Send user to password recovery page if they forgot password-->
    <a href="register.php">Create an account</a><br><br>
    <a href= "passrecover.php">I forgot my password</a>
  </fieldset>
 </form>
</div>
</body>
</html>


