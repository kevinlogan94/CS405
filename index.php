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
     <div id="footer"></div> 
  </body> 
</html>
