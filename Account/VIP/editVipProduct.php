<?php
 $ProductID=$_POST['ProductID'];

 include '../../databaselogin.php';

 // Create connection
 $conn = new mysqli($servername, $username, $password, $db);

 // Check connection
 if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 }

 $sql = "select * from product where ProductID=$ProductID;";
 $result = $conn->query($sql);

 $data = $result->fetch_assoc();
 $VIP = $data['VIP'];
 echo $VIP;

 if($VIP == 1){
   echo "Delete";
   $sql = "update product
	   set VIP=0
	   where ProductID=$ProductID;";
   $conn->query($sql);
 }
 else {
   echo "add";
   $sql = "update product
           set VIP=1
           where ProductID=$ProductID;";
   $conn->query($sql);
 }

 $conn->close();

 header('location:/CS405/Account/VIP'); 

?>



