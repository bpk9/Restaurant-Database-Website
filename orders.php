<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Orders</title>

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

            <h2>Orders</h2>

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
                        <th>Order Status</th>
                        <th class="complete-row">Mark as Complete</th>
                        <th class="remove-row">Delete Order</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="id-row">2</td>
                        <td class="id-row">3</td>
                        <td>McDonald's</td>
                        <td>Fast Food</td>
                        <td>123 Street Drive, Faketown PA 12345</td>
                        <td class="complete-row"><?php echo '<form action="/set_order_as_complete.php" method="post"><button type="submit"><i class="fa fa-check-square"></i></button><input type="hidden" name="itemid" value="' . htmlspecialchars($row['itemid']) . '"></form>'; ?></td>
                        <td class="remove-row"><?php echo '<form action="/delete_order.php" method="post"><button type="submit"><i class="fa fa-trash"></i></button><input type="hidden" name="orderid" value="' . htmlspecialchars($row['orderid']) . '"></form>'; ?></td>
                    </tr>
                </table>
            </div>

            <!-- add to db -->
            <div class="add-to-db">
                <form action="/action_page.php">
                    <table>
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>
                                <input type="text" name="Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Type:
                            </td>
                            <td>
                                <input type="text" name="Type">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address:
                            </td>
                            <td>
                                <input type="text" name="Address">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone Number:
                            </td>
                            <td>
                                <input type="text" name="Phone">
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
