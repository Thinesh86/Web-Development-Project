<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
        $query = "SELECT * FROM admin WHERE name = ? LIMIT 1";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $admin_data = mysqli_fetch_assoc($result);

                if ($password == $admin_data['password']) {
                    $_SESSION['admin_id'] = $admin_data['admin_id'];
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong password!');</script>";
                }
            } else {
                echo "<script>alert('Admin with the name \"$name\" not found!');</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            die("<script>alert('Error in prepared statement: " . mysqli_error($con) . "');</script>");
        }
    } else {
        echo "<script>alert('Please enter both name and password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #box {
            background-color: grey;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
        }

        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100%;
            color: white;
            background-color: lightblue;
            border: none;
            cursor: pointer;
        }

        #button:hover {
            background-color: #3498db;
        }

        #signup-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: white;
        }

        #signup-link:hover {
            color: #3498db;
        }
    </style>
</head>

<body>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Admin Login</div>
            <input id="text" type="text" name="name" placeholder="Name"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>
            <input id="button" type="submit" value="Login"><br><br>
        </form>
        <a href="admin_signup.php" id="signup-link">Don't have an account? Signup here</a>
        <a href="login.html" id="signup-link">Back to user login</a>
    </div>
</body>

</html>
