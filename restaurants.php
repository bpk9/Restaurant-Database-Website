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
        <title>RMS | Restaurants</title>

        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-- Sidenav -->
        <div class="sidenav">
            <h5 class="title">Restaurant Management System</h5>
            <hr>
            <a href="/start.php">Dashboard</a>
            <a href="/reports.php">Reports</a>
            <a>Logout</a>
        </div>

        <!-- Main Content -->
        <div class="main">

            <h2>Restaurants</h2>

            <!-- Search Bar -->
            <div class="search-container">
                <form action="/action_page.php">
                    <select name="search_type" id="search_type">
                        <option value="Name">Name</option>
                        <option value="Type">Type</option>
                        <option value="Address">Address</option>
                        <option value="Phone Number">Phone Number</option>
                    </select>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- add and delete buttons -->
            <div class="add-delete-buttons">
                <button>Add Restaurant</button>
                <button>Delete Restaurant</button>
            </div>

            <!-- Data Table -->
            <div class="data-table">
                <table>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>McDonald's</td>
                        <td>Fast Food</td>
                        <td>123 Street Drive, Faketown PA 12345</td>
                        <td>123-456-7890</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
