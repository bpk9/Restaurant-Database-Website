<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'website';
$password = 'password123';
$host = 'localhost';
$dbname = 'restaurants';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT O.orderid, C.fname, C.mname, C.lname, O.street, P.city, P.state, O.zipcode, O.phone_number, R.rname, S.status_name FROM Orders O, Postal P, Restaurants R, Customers C, Order_status S WHERE O.orderid = "' . $_POST["orderid"] . '" AND O.restaurantid = R.restaurantid AND O.customerid = C.customerid AND O.zipcode = P.zipcode AND O.orderstatus = S.statusid LIMIT 1';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $sql2 = 'SELECT I.quantity, M.name, I.quantity*M.unitprice AS subtotal FROM Orders O, In_order I, Menu_item M WHERE O.orderid = "' . $_POST["orderid"] . '" AND O.orderid=I.orderid AND I.itemid=M.itemid';
    $q2 = $pdo->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>RMS | Order Report</title>
		
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>

		<!-- Sidenav -->
	    <div class="sidenav">
	        <h5 class="title">Restaurant Management System</h5>
	        <hr>
	        <a href="/start.php">Dashboard</a>
	    </div>

	    <div class="main">
	    	<h2>Order Info</h2>
	    	<?php while ($row = $q->fetch()): ?>
	    		<div class="order-info">
			    	<?php 
			    	echo "Order #", htmlspecialchars($row['orderid']), "<br><br>"; 
			    	echo "Name: ", htmlspecialchars($row['fname']), ' '; 
			    	echo htmlspecialchars($row['mname']), ' '; 
			    	echo htmlspecialchars($row['lname']), "<br>"; 
				    echo "Address: ", htmlspecialchars($row['street']), ", "; 
				    echo htmlspecialchars($row['city']), ', '; 
				    echo htmlspecialchars($row['state']), ' '; 
				    echo htmlspecialchars($row['zipcode']), '<br>'; 
				    echo 'Phone Number: ', htmlspecialchars($row['phone_number']), '<br><br>'; 
				    echo 'Restaurant: ', htmlspecialchars($row['rname']), '<br>'; 
				    echo 'Order Status: ', htmlspecialchars($row['status_name']); 
				    ?>
		    	</div>
		    <?php endwhile; ?>

	    	<br>

	    	<h2>Order Details</h2>
	    	<!-- Order Items -->
	    	<div class="data-table">
	    		<table>
	                <tr>
	                	<th>Quantity</th>
	                    <th>Menu Item</th>
	                    <th>Subtotal</th>
	                    <!-- Option to change quantity? -->
	                </tr>
	            
	            
	                <?php while ($row = $q2->fetch()): ?>
	                    <tr>
	                        <td><?php echo htmlspecialchars($row['quantity']) ?></td>
	                        <td><?php echo htmlspecialchars($row['name']); ?></td>
	                        <td><?php echo htmlspecialchars($row['subtotal']); ?></td>
	                    </tr>
	                <?php endwhile; ?>
	            </table>
	        </div>
	    </div>

	</body>
</html>