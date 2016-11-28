<?php
//curl -u user:password http://webstoreapi.azurewebsites.net/api/Account/userinfo
// Get cURL resource

 $product = array();
 $orderContainProduct = array();
 $orders = array();
 $user = array();
 $userOrder = array();

 include 'databaselogin.php';

 // Create connection
 $conn = new mysqli($servername, $username, $password, $db);

 // Check connection
 if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 }

 //Get product array values
 $sql = "select * from product;";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
	 array_push($product, $row);
 }
 
 //Get orderContainProduct values
 $sql = "select * from orderContainProduct;";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
         array_push($orderContainProduct, $row);
 }

 //Get orders values
 $sql = "select * from orders;";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
         array_push($orders, $row);
 }

 //Get user values
 $sql = "select * from user;";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
         array_push($user, $row);
 }

 //Get userOrder values
 $sql = "select * from userOrder;";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
         array_push($userOrder, $row);
 }

 //encode as json
 $Database = array("orders" => $orders, "user" => $user, "userOrder" => $userOrder, "orderContainProduct" => $orderContainProduct, "product" => $product);
 $DatabaseJSON = json_encode($Database);
 
 echo $DatabaseJSON;
 $conn->close();

 //transition to homepage
 //header('location:index.php');
require 'vendor/autoload.php';


$client = new GuzzleHttp\Client();
$res = $client->get('http://webstoreapi.azurewebsites.net/api/Account/userinfo', [
    'auth' =>  ['user', 'pass']
]);
echo $res->getStatusCode();           // 200
echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
echo $res->getBody();                 // {"type":"User"...'
//var_export($res->json());             // Outputs the JSON decoded data
echo "<br>";

?>


