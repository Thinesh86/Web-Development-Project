<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: left;
            color: #333;
        }

        .event-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .buy_bt {
            margin: 10px 0;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 4px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: block;
        }

        a:hover {
            text-decoration: underline;
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
    <h1>Add Category</h1>

    <p>Select event to add category:</p>

    <div class="event-container">
        <div class="buy_bt">
            <a href="adminAddCategory1.php?id=Digital Marketing Confernce (Date: 1st February 2024)">
                Digital Marketing Conference (Date: 1st February 2024)
            </a>
        </div>
        <div class="buy_bt">
            <a href="adminAddCategory1.php?id=<?php echo urlencode('Advertising & Technology Conference (Date: 2nd February 2024)'); ?>">
            Advertising & Technology Conference (Date: 2nd February 2024)
            </a>
        </div>

    </div>

    <a href="admin_dashboard.php" class="back-button">Back to Main Page</a>
</body>
</html>
