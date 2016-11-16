<?php
	$ProductID = $_POST['ProductID'];
	echo $ProductID;

	$logged_in = False;
	if (isset($_COOKIE['login'])) {
    		$logged_in = True;
	}
	
	if($logged_in) {

        	include 'databaselogin.php';

        	// Create connection
        	$conn = new mysqli($servername, $username, $password, $db);

        	// Check connection
        	if ($conn->connect_error) {
        	       	 die("Connection failed: " . $conn->connect_error);
        	}

		$sql = "select * 
			from orders, userOrder 
			where OrderStatus='UnCheckout'
			and UserID=" . $_COOKIE['login'] . ";";
        	echo $sql;

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<br> There are items in the cart";
			//add product
		}
		else{	
			//Insert a new OrderID with OrderStatus='UnCheckout' then add the ProductID to the orderContainProduct table with Amount=1 for that same OrderID.
        	}
		// output data of each row
        	$conn->close();

	}
	else {
		session_start();
        	$_SESSION['alert'] = "You must be logged in to add to your cart";
        	header('location:login.php');
	}
?>



