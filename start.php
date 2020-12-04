<!DOCTYPE html>
<html>
    <head>
        <title>RMS | Dashboard</title>

        <link rel="stylesheet" href="styles.css">
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

            <div class="card-row">
                <!-- Restaurants Card -->
                <div class="card" onclick="location.href='/restaurants.php';">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/685/685352.svg">
                    <div class="container">
                        <h4><b>Restaurants</b></h4>
                    </div>
                </div>

                <!-- Customers Card -->
                <div class="card" onclick="location.href='/customers.php';">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/1040/1040005.svg">
                    <div class="container">
                        <h4><b>Customers</b></h4>
                    </div>
                </div>
            </div>

            <div class="card-row">
                <!-- Menu Card -->
                <div class="card" onclick="location.href='/menu.php';">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/3522/3522187.svg">
                    <div class="container">
                        <h4><b>Menu Items</b></h4>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="card" onclick="location.href='/orders.php';">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/1147/1147847.svg">
                    <div class="container">
                        <h4><b>Orders</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
