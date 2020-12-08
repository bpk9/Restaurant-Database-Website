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
    $sql = "SELECT * FROM Employee";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Employees</title>

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

            <h2>Employees</h2>

            <!-- Data Table -->
            <div class="data-table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Street</th>
                        <th>Zipcode</th>
                        <th>Phone Number</th>
                    </tr>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo html_entity_decode($row['employeeid']); ?></td>
                            <td><?php echo html_entity_decode($row['fname']); ?></td>
                            <td><?php echo html_entity_decode($row['mname']) ?></td>
                            <td><?php echo html_entity_decode($row['lname']); ?></td>
                            <td><?php echo html_entity_decode($row['street']); ?></td>
                            <td><?php echo html_entity_decode($row['zipcode']); ?></td>
                            <td><?php echo html_entity_decode($row['phone_number']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

        </div>
    </body>
</html>
