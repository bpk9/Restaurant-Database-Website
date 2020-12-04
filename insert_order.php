<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'website';
$password = 'password123';
$host = 'localhost';
$dbname = 'restaurants';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Insert Order</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Inserting new order: " . $_POST["customerid"] . " " . $_POST["restaurantid"] . " " . $_POST["street"] . " " . $_POST["zipcode"] . " " . $_POST["phone_number"] . " " . $_POST["orderstatus"] . "..."; 
				$sql = 'INSERT INTO Orders (customerid, restaurantid, street, zipcode, phone_number, orderstatus)';
				$sql = $sql . 'VALUES ("'. htmlentities($_POST["customerid"], ENT_QUOTES) . '","' . htmlentities($_POST["restaurantid"], ENT_QUOTES) . '","' . htmlentities($_POST["street"], ENT_QUOTES) . '","' . htmlentities($_POST["zipcode"], ENT_QUOTES) . '","' . htmlentities($_POST["phone_number"], ENT_QUOTES) . '","' . htmlentities($_POST["orderstatus"], ENT_QUOTES) . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New order created successfully";
			?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='orders.php'
					}, 3000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>
