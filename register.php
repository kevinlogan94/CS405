<!--
Prolog: register.php
Purpose: Allow user to create an account on the website.
Preconditions: Fill out first name, last name, username, password, retype password, email, retype email, and number contact.
Postconditions: Page transition to their new dashboard. Account information inputted into the database.
-->


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  <title>Register</title>
  <!--MOBILE-->
  <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">  -->
  <!--REQUIRED FOR HEADER-->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="formValidation.js"></script>
  <script>$(function(){
  $("#header").load("header.php"); });
  /*
        CheckNumber function
        Purpose: Allow users to only input numbers into the phone number input.
        Parameters: event - What you input into an input. Ex: hitting the "L" key.
        Return:True if you enter backspace or a number, otherwise false.
  */
  function CheckNumber(event){
  var charCode = (event.which) ? event.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57))
   return false;
  return true;
  }
  </script>
</head>
<body>
<!--REQUIRED FOR HEADER-->
 <div id="header"></div>
<div class="registerbox">
 <h1 style="text-align: center;">Register</h1>
 <?php
    // checks if there is an error message to handle. If so, display to screen
    session_start();
    if (!empty($_SESSION['register_error_msg'])) {
        echo "<div style=\"color: red; text-align: center;\">Error: ".$_SESSION['register_error_msg']."</div>";
        unset($_SESSION['register_error_msg']);
    }
 ?>
 <form name="myform" action="processreg.php" method="post" onsubmit="return registerValidateForm()">
  <hr>
    <div class="rows">
       <label id="icon"><i class="icon-user"></i></label>
       <input type="text" name="firstname" placeholder="First Name">
    </div>
    <div class="rows">
       <label id="icon"><i class="icon-user"></i></label>
       <input type="text" name="lastname" placeholder="Last Name"><br>
    </div>
    <div class="rows">
       <p id="firstname"></p>
    </div>
    <div class="rows">
       <p id="lastname"></p>
    </div>
     <br>
    <div class="rows">
       <label id="icon"><i class="icon-user"></i></label>
       <input type="text" name="username" placeholder="Username">
    </div>
    <div class="rows">
    <p id="username"></p>
    </div>
    <br>
    <div class="rows">
       <label id="icon"><i class="icon-key"></i></label>
       <input type="password" name="password" placeholder="Password"><br>
    </div>
    <div class="rows">
       <label id="icon"><i class="icon-shield"></i></label>
       <input type="password" name="confpass" placeholder="Retype Password">
    </div>
    <div class="rows">
       <p  id="password"></p>
    </div>
    <br>
    <div class="rows">
       <label id="icon"><i class="icon-shield"></i></label>
       <select name="class" selected="Customer">
         <option value="Customer">Customer</option>
	 <option value="Manager">Manager</option>
	 <option value="Staff">Staff</option>
	 <option value="VIP">VIP</option>
       </select>
    </div>
    <br>
   <label id="shift">Contact</label>
    <hr>
    <div class="rows">
       <label id="icon"><i class="icon-envelope"></i></label>
       <input type="text" name="email" placeholder="Email">
    </div>
    <div class="rows">
       <label id="icon"><i class="icon-shield"></i></label>
       <input type="text" name="confemail" placeholder="Retype Email"><br>
    </div>
    <div class="rows">
       <p id="email"></p>
    </div>
    <br>
    <div class="rows">
       <label id="icon"><i class="icon-phone"></i></label>
        <input type="text" name="area" placeholder="###" size="3" onkeypress="return CheckNumber(event)">
    - <input type="text" id="phoneshift" name="phone" placeholder="#######"size="8" onkeypress="return CheckNumber(event)"><br>
    </div>
    <div class="rows">
       <p id="area"></p>
    </div>
    <div class="rows">
       <p id="phone">
    </div>
    <br>
    <input id="shift" type="submit" value="Submit">
  </fieldset>
 </form>
 </div>
</body>
</html>


