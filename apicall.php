<?php
//curl -u user:password http://webstoreapi.azurewebsites.net/api/Account/userinfo
// Get cURL resource
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$res = $client->get('http://webstoreapi.azurewebsites.net/api/Account/userinfo', [
    'auth' =>  ['user', 'pass']
]);
echo $res->getStatusCode();           // 200
//echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//echo $res->getBody();                 // {"type":"User"...'
//var_export($res->json());             // Outputs the JSON decoded data
echo "<br>";
?>


