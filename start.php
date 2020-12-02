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
    $sql = 'SELECT lname, fname, loginid FROM users';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Management System</title>

        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        <!-- Sidenav -->
        <div class="sidenav">
            <h5 class="title">Restaurant Management System</h5>
            <hr>
            <a href="/">Dashboard</a>
            <a href="/reports.php">Reports</a>
            <a>Logout</a>
        </div>

        <!-- Main Content -->
        <div class="main">

            <div class="card-row">
                <!-- Restaurants Card -->
                <div class="card">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/685/685352.svg">
                    <div class="container">
                        <h4><b>Restaurants</b></h4>
                    </div>
                </div>

                <!-- Customers Card -->
                <div class="card">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/1040/1040005.svg">
                    <div class="container">
                        <h4><b>Customers</b></h4>
                    </div>
                </div>
            </div>

            <div class="card-row">
                <!-- Menu Card -->
                <div class="card">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/3522/3522187.svg">
                    <div class="container">
                        <h4><b>Menu</b></h4>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="card">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/1147/1147847.svg">
                    <div class="container">
                        <h4><b>Orders</b></h4>
                    </div>
                </div>
            </div>

            <div class="card-row">
                <!-- Employees Card -->
                <div class="card">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/912/912318.svg">
                    <div class="container">
                        <h4><b>Employees</b></h4>
                    </div>
                </div>
            </div>
    </body>
</html>
