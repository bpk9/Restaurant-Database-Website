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
    $sql = "SELECT * FROM Customers";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Customers</title>

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
            <h2>Customers</h2>

            <!-- Search Bar -->
            <div class="search-container" id="customer-search-container">
                <form action="/search_customer.php" method="post">
                    <select name="search_type" id="search_type">
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
                        <th>Name</th>
                        <th>Street</th>
                        <th>Zipcode</th>
                        <th class="remove-row">Remove</th>
                    </tr>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo html_entity_decode($row['customerid']) ?></td>
                            <td><?php echo html_entity_decode($row['fname']) . " " . html_entity_decode($row['mname']) . " " . html_entity_decode($row['lname']); ?></td>
                            <td><?php echo html_entity_decode($row['street']); ?></td>
                            <td><?php echo html_entity_decode($row['zipcode']); ?></td>
                            <td class="remove-row"><?php echo '<form action="/delete_customer.php" method="post"><button type="submit"><i class="fa fa-trash"></i></button><input type="hidden" name="customerid" value="' . htmlspecialchars($row['customerid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <!-- add to db -->
            <div class="add-to-db">
                <form action="/insert_customer.php" method="post">
                    <table>
                        <tr>
                            <td>
                                First Name:
                            </td>
                            <td>
                                <input type="text" name="fname">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Middle Name:
                            </td>
                            <td>
                                <input type="text" name="mname">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last Name:
                            </td>
                            <td>
                                <input type="text" name="lname">
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
                    </table>
                    <br>
                    <button>Add Customer</button>
                </form>
            </div>
        </div>
    </body>
</html>
