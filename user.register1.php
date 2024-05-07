<?php
    $eventName = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-check {
            margin-bottom: 10px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-secondary {
            background-color: #6c757d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    

<div class="container">
    <div class="form-container sign-up-container">
        <form name="form1" action="userConfirmation.php" method="post" onsubmit="return checkRegister();">
            <h1>Event Information</h1>

            <div class="form-group">
                <label for="event"><b>Event Name:</b></label>
                <input type="text" readonly class="form-control-plaintext" name="event" id="event" value="<?php echo $eventName; ?>">
            </div>
            
            <div class="form-group">
                <label><b>Choose Category:</b></label>
                <?php
                    $con = mysqli_connect("localhost", "root", "", "event");
                    $sql = "SELECT category FROM event WHERE eventname = '$eventName'";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="Category2" value="<?php echo $row['category']; ?>" >
                                <label class="form-check-label" for="Category2"><?php echo $row['category']; ?></label>
                            </div>
                <?php
                        }
                    } else {
                        echo "<p>No categories available for this event.</p>";
                    }
                ?>
            </div>

            <div>
                <button type="submit" class="btn btn-success">Register</button>
                <a href='user.register.php'><button type='button' class='btn btn-secondary'>Back</button></a>
            </div>
            
        </form>
    </div>
</div>

</body>
</html>
