<?php
session_start();

include("connection.php");
include("function.php");

$admin_data = check_admin_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        #dashboard-buttons {
            margin-top: 20px;
        }

        .dashboard-button {
            padding: 10px;
            margin-right: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .dashboard-button:hover {
            background-color: #297fb8;
        }

        #logout-link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
        }

        #logout-link:hover {
            color: #297fb8;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Welcome, <?php echo $admin_data['name']; ?>!</h1>

    <div id="dashboard-buttons">
        <a href="adminView.php" class="dashboard-button">View</a>
        <a href="adminAddCategory.php" class="dashboard-button">Add Category</a>
        <a href="adminsearch.php" class="dashboard-button">Search</a>
    </div><br/>

    <a href="admin_logout.php" id="logout-link">Logout</a>

    <!-- Add your admin dashboard content here -->
</body>

</html>