<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'website';
$password = 'password123';
$host = 'localhost';
$dbname = 'restaurants';

try {
	$search_type = $_POST["search_type"];
	$search_query = htmlentities($_POST["search_query"], ENT_QUOTES);

	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$sql = "SELECT * FROM Menu_item WHERE $search_type LIKE '%$search_query%'";
	// echo $sql;
	$q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Search Menu</title>

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

        <!-- Main Content -->
        <div class="main">

            <!-- Title -->
            <?php echo "<h2>Menu Items from Restaurant #" . $search_query . "</h2>" ; ?>

            <!-- Search Bar -->
            <div class="search-container">
                <form action="/search_restaurant.php" method="post">
                    <select name="search_type">
                        <option value="restaurantid">Restaurant ID</option>
                    </select>
                    <input type="text" placeholder="Search.." name="search_query">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Data Table -->
            <div class="data-table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Unit Price</th>
                        <th>Active</th>
                        <th class="remove-row">Remove</th>
                    </tr>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo html_entity_decode($row['itemid']) ?></td>
                            <td><?php echo html_entity_decode($row['name']); ?></td>
                            <td><?php echo html_entity_decode($row['unitprice']); ?></td>
                            <td><?php echo html_entity_decode($row['active']); ?></td>
                            <td class="remove-row"><?php echo '<form action="/delete_menu.php" method="post"><button type="submit"><i class="fa fa-trash"></i></button><input type="hidden" name="itemid" value="' . htmlspecialchars($row['itemid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <!-- add to db -->
            <div class="add-to-db">
                <form action="/insert_menu.php" method="post">
                    <table>
                        <tr>
                            <td>
                                Restaurant ID:
                            </td>
                            <td>
                                <input type="text" name="restaurantid">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Unit Price:
                            </td>
                            <td>
                                <input type="text" name="unitprice">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Active:
                            </td>
                            <td>
                                <select name="active">
                                    <option value="1">YES</option>
                                    <option value="0">NO</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button>Add Menu Item</button>
                </form>
            </div>
        </div>
    </body>
</html>
