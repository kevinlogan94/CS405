<?php

$url = 'http://webstoreapi.azurewebsites.net/api/Account/UserInfo';
$data = array('key1' => 'value1', 'key2' => 'value2');
$method = 'GET';

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => $method,
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */
	echo "Na";	

}

var_dump($result);

?>


