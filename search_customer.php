<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Customer Search</title>

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
            <?php echo "<h2>Customers with Restaurant ID matching \"" . $search_query . "\"</h2>" ; ?>

            <!-- Search Bar -->
            <div class="search-container" id="customer-search-container">
                <form action="/search_customer.php">
                    <select name="search_type" id="search_type">
                        <option value="restaurantid">Restaurant ID</option>
                    </select>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Data Table -->
            <div class="data-table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th class="remove-row">Remove</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Brian Kasper</td>
                        <td>123 Street Drive, Faketown PA 12345</td>
                        <td class="remove-row"><?php echo '<form action="/delete_customer.php" method="post"><button type="submit"><i class="fa fa-trash"></i></button><input type="hidden" name="restaurantid" value="' . htmlspecialchars($row['customerid']) . '"></form>'; ?></td>
                    </tr>
                </table>
            </div>

            <!-- add to db -->
            <div class="add-to-db">
                <form action="/insert_customer.php">
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
