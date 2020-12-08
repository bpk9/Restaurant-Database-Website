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
    $sql = 'SELECT M.itemid, M.name, SUM(I.quantity) as Quantity_Sold, SUM(I.quantity)*M.unitprice AS Total_Sales FROM Restaurants R, Menu_item M, In_order I WHERE R.restaurantid = "' . $_POST["restaurantid"] . '" AND R.restaurantid = M.restaurantid AND M.itemid=I.itemid GROUP BY I.itemid';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>RMS | Sales Report</title>
		
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

	    	<h2>Sales Report</h2>

	    	<!-- Data Table -->
            <div class="data-table">
                <table>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Quantity Sold</th>
                        <th>Total Sales</th>
                    </tr>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo html_entity_decode($row['itemid']) ?></td>
                            <td><?php echo html_entity_decode($row['name']); ?></td>
                            <td><?php echo html_entity_decode($row['Quantity_Sold']); ?></td>
                            <td><?php echo html_entity_decode($row['Total_Sales']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

	    </div>

	</body>
</html>