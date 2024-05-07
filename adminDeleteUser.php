<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Participant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <?php
            $id = $_GET['id'];
            $conn = mysqli_connect("localhost", "root", "", "event");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "DELETE FROM participants WHERE username = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<h1>Successfully deleted participant with ID: $id</h1>";
                echo "<a href='adminsearch.php' class='btn'>Click here to view other Participants</a>";
            } else {
                echo "<h1>Error deleting participant with ID: $id</h1>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
