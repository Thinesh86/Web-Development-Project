<?php
include("connection.php");
include("function.php");

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

   if (!empty($name) && !empty($password)) {
    $existing_query = "SELECT * FROM admin WHERE name = '$name'";
    $existing_result = mysqli_query($con, $existing_query);

    if ($existing_result && mysqli_num_rows($existing_result) > 0) {
        $errorMessage = "Admin with the same name already exists!";
        echo "<script>alert('$errorMessage');</script>";
    } else {
        $insert_query = "INSERT INTO admin (name, password) VALUES ('$name', '$password')";
        mysqli_query($con, $insert_query);

        echo "<script>alert('Admin registration successful! Now you can log in.');</script>";
    }
} else {
    $errorMessage = "Please enter both name and password!";
    echo "<script>alert('$errorMessage');</script>";
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
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

        #error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Admin Signup</div>
            <div id="error-message"><?php echo $errorMessage; ?></div>
            <input id="text" type="text" name="name" placeholder="Name"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>
        </form>
        <a href="admin_login.php" id="signup-link">Already have an account? Login here</a>
    </div>
</body>

</html>

