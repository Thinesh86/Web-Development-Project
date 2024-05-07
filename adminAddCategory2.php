<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container {
            text-align: center;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            margin-top: 20px;
        }

        .success-message, .error-message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
    <?php
    $event = $_POST['event'];
    $category = $_POST['category'];
    $quota = $_POST['quota'];

    $con = mysqli_connect("localhost", "root", "", "event");
    $sql = "INSERT INTO event (eventname, category, quota) VALUES ('$event', '$category', '$quota')";
    $result = mysqli_query($con, $sql);
    ?>
    <div class="container">
        <div class="form-container sign-up-container">
            <?php
            if (!$result) {
                echo "<div class='error-message'><h1>Failed to add</h1></div>";
            } else {
                echo "<div class='success-message'><h1>Successfully added</h1></div>";
            }
            ?>
            <a href="adminAddCategory.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
    </div>
</body>
</html>
