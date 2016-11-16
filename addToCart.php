<?php
	$ProductID = $_POST['ProductID'];
	echo $ProductID;
	echo "<br>";	

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
			where OrderStatus = 'UnCheckout'
			and orders.OrderID = userOrder.OrderID
			and UserID=" . $_COOKIE['login'] . ";"; 

		$result = $conn->query($sql);
		$data = $result->fetch_assoc();
                $orderID = $data["OrderID"];
		echo "<br><br> $orderID";

		// If there is an order with OrderStatus='UnCheckout' connected to the UserID of the person logged in
		if ($result->num_rows > 0) {
			echo "<br> We do have an order with status UnCheckout connected to this UserID";
			// This means the item we are adding to the cart is already in the cart, and we need to add another one of these items to the cart
			// as long as there are still enough quanity left? (not sure about quantity thing)
			
			$sql1 = "select o.OrderID 
                        	from orderContainProduct as o, orders, userOrder 
                        	where orders.OrderStatus='UnCheckout'
                        	and o.OrderID = orders.OrderID
                        	and o.OrderID = userOrder.OrderID
                        	and o.ProductID = ". $ProductID ."
                        	and UserID=" . $_COOKIE['login'] . ";";

			$result = $conn->query($sql1);

			if ($result->num_rows > 0) {
				echo "<br> This item is in the cart already. Adding it again";
				
				$sql2 = "update orderContainProduct
					 set Amount=(Amount+1)
					 where OrderID = ". $orderID ."
					 and ProductID = ". $ProductID .";";
					
				$conn->query($sql2);
				
				session_start();
                                $_SESSION['alert'] = "The product has been added to your cart!";
				header('location:index.php'); // take user back to home page after product is added to cart
			}
			else {
				echo "<br> This item is NOT in the cart. Adding it for first time now!";
			
				// Insert the ProductID to orderContainProduct table with Amount = 1 for the same OrderID
				$sql2 = "insert into orderContainProduct
					 values(". $orderID .",". $ProductID .", 1);";
				$conn->query($sql2);
				
				session_start();
                        	$_SESSION['alert'] = "The product has been added to your cart!";
				header('location:index.php'); // take user back to home page after product is added to cart
			}			

		}
		else{	
			//Insert a new OrderID with OrderStatus='UnCheckout' then add the ProductID to the orderContainProduct table with Amount=1 for that same OrderID.
			echo "<br> We do NOT have an order with status UnCheckout connected to this UserID";
		
			$sql1 = "select max(OrderID) from orders;";
			$result = $conn->query($sql1);
			$row = $result->fetch_assoc();
			$orderID = $row["max(OrderID)"];
			$orderID++;

			$sql2 = "insert into orders(OrderID, OrderStatus)
				 values(". $orderID .",'UnCheckout');";
			$conn->query($sql2);

			$sql3 = "insert into userOrder
				 values(". $_COOKIE['login'] .",". $orderID .");";
			$conn->query($sql3);

			$sql4 = "insert into orderContainProduct
				 values(". $orderID .",". $ProductID .", 1);";
			$conn->query($sql4);
			
			session_start();
                	$_SESSION['alert'] = "The product has been added to your cart!";
			header('location:index.php'); // take user back to home page after product is added to cart			
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



