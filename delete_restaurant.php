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
		<title>RMS | Delete Restaurant</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Deleting Restaurant: " . $_POST["rname"] . "..."; 
				$sql = 'DELETE FROM Restaurants WHERE restaurantid = "' . $_POST["restaurantid"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Restaurant deleted successfully";
				?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='restaurants.php'
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
