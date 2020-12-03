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
        <title>RMS | Insert Restaurant</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Inserting new restaurant: " . $_POST["rname"] . " " . $_POST["rtype"] . " " . $_POST["street"] . " " . $_POST["zipcode"] . " " . $_POST["phone_number"] . "..."; 
				$sql = 'INSERT INTO Restaurants (rname, rtype, street, zipcode, phone_number) ';
				$sql = $sql . 'VALUES ("'. htmlentities($_POST["rname"], ENT_QUOTES) . '","' . htmlentities($_POST["rtype"], ENT_QUOTES) . '","' . htmlentities($_POST["street"], ENT_QUOTES) . '","' . htmlentities($_POST["zipcode"], ENT_QUOTES) . '","' . htmlentities($_POST["phone_number"], ENT_QUOTES) . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New restaurant created successfully";
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
