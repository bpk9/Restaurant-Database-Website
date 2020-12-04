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
        <title>RMS | Insert Menu Item</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Inserting new menu item: " . $_POST["restaurantid"] . " " . $_POST["name"] . " " . $_POST["unitprice"] . " " . $_POST["active"] . "..."; 
				$sql = 'INSERT INTO Menu_item (restaurantid, name, unitprice, active) ';
				$sql = $sql . 'VALUES ("'. htmlentities($_POST["restaurantid"], ENT_QUOTES) . '","' . htmlentities($_POST["name"], ENT_QUOTES) . '","' . htmlentities($_POST["unitprice"], ENT_QUOTES) . '","' . htmlentities($_POST["active"], ENT_QUOTES) . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New menu item created successfully";
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
