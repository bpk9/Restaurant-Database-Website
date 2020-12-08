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
    $sql = "SELECT * FROM Orders WHERE $search_type LIKE '%$search_query%'";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Search Orders</title>

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
            <?php echo "<h2>Orders matching Customer ID: " . $search_query . "</h2>" ; ?>

            <!-- Search Bar -->
            <div class="search-container" id="order-search-container">
                <form action="/search_order.php" method="post">
                    <select name="search_type">
                        <option value="customerid">Customer ID</option>
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
                        <th class="id-row">Customer ID</th>
                        <th class="id-row">Restaurant ID</th>
                        <th>Street</th>
                        <th>Zipcode</th>
                        <th>Phone Number</th>
                        <th>Order Status</th>
                        <th class="complete-row">Mark as Complete</th>
                        <th class="remove-row">Delete Order</th>
                        <th class="report-row">Generate Report</th>
                    </tr>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo html_entity_decode($row['orderid']); ?></td>
                            <td class="id-row"><?php echo html_entity_decode($row['customerid']); ?></td>
                            <td class="id-row"><?php echo html_entity_decode($row['restaurantid']) ?></td>
                            <td><?php echo html_entity_decode($row['street']); ?></td>
                            <td><?php echo html_entity_decode($row['zipcode']); ?></td>
                            <td><?php echo html_entity_decode($row['phone_number']); ?></td>
                            <td><?php echo html_entity_decode($row['orderstatus']) ? "Complete" : "In Progress"; ?></td>
                            <td class="complete-row"><?php echo '<form action="/set_order_as_complete.php" method="post"><button type="submit"><i class="fa fa-check-square"></i></button><input type="hidden" name="orderid" value="' . htmlspecialchars($row['orderid']) . '"></form>'; ?></td>
                            <td class="remove-row"><?php echo '<form action="/delete_order.php" method="post"><button type="submit"><i class="fa fa-trash"></i></button><input type="hidden" name="orderid" value="' . htmlspecialchars($row['orderid']) . '"></form>'; ?></td>
                            <td class="report-row"><?php echo '<form action="/order_report.php" method="post"><button type="submit"><i class="fa fa-info-circle"></i></button><input type="hidden" name="orderid" value="' . htmlspecialchars($row['orderid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <!-- add to db -->
            <div class="add-to-db">
                <form action="/insert_order.php" method="post">
                    <table>
                        <tr>
                            <td>
                                Customer ID:
                            </td>
                            <td>
                                <input type="text" name="customerid">
                            </td>
                        </tr>
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
                                Street:
                            </td>
                            <td>
                                <input type="text" name="street">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Zipcode:
                            </td>
                            <td>
                                <input type="text" name="zipcode">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone Number:
                            </td>
                            <td>
                                <input type="text" name="phone_number">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Order Status:
                            </td>
                            <td>
                                <select name="orderstatus">
                                    <option value="0">In Progress</option>
                                    <option value="1">Complete</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button>Add Order</button>
                </form>
            </div>
        </div>
    </body>
</html>
