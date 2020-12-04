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
		<title>RMS | Delete Menu Item</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Deleting Menu Item with ID: " . $_POST["itemid"] . " ..."; 
				$sql = 'DELETE FROM Menu_item WHERE itemid = "' . $_POST["itemid"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Menu Item deleted successfully";
				?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='menu.php'
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
