<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User view event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
        }

        h1, h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 8px;
            width: 200px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

         /* Back button styles */
         .back-button {
            display: block;
            margin-top: 20px; /* Adjust the margin as needed */
            color: #000; /* Black text color */
            text-decoration: none;
        }
        
        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Enter your username to view your event</h1>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Enter your username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">See your event</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["username"])) {
        $username = $_GET["username"];
        $con = mysqli_connect("localhost", "root", "", "event") or die("Cannot connect to server." . mysqli_error($con));

        // Retrieve events and categories for the specified username
        $eventSql = "SELECT eventname, category FROM registerevent WHERE username ='$username'";
        $eventResult = mysqli_query($con, $eventSql) or die("Cannot execute event sql.");

        if (mysqli_num_rows($eventResult) > 0) {
            // Display events and categories
            echo "<h2>Events registered for : $username</h2>";
            echo "<table>";
            echo "<tr><th>Event Name</th><th>Category</th></tr>";
            while ($row = mysqli_fetch_assoc($eventResult)) {
                echo "<tr><td>{$row['eventname']}</td><td>{$row['category']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No events found for user: $username";
        }
    }
    ?>

    <a href="userprofilemain.php" class="back-button">Back to Main Page</a>
</body>
</html>

