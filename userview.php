<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            background-color: #1f2641;
            color: #fff;
            padding: 20px 0;
            border-radius: 10px;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px; /* Increased margin for better spacing */
        }

        .formspace {
            display: flex;
            align-items: center;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            outline: none;
            width: 300px; /* Adjusted width for better fit */
        }

        .btn {
            background-color: #fff;
            color: #000;
            font-size: 18px;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .gbbtn {
            background-color: #f02c2c;
            color: #fff;
            font-size: 18px;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover, .gbbtn:hover {
            background-color: #04AA6D;
            color: #fff;
        }

        .btn:active, .gbbtn:active {
            background-color: #ff6b6b;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $iduser = $_SESSION["id"];
    if(isset($iduser)) {
        $con = mysqli_connect("localhost", "root", "", "event") or die("Cannot connect to server." . mysqli_error($con));
        $sql = "SELECT * FROM participants WHERE iduser ='$iduser'";
        $result = mysqli_query($con, $sql) or die("Cannot execute sql.");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <h1>Your Profile</h1>
    <form method="post" action="updateuser.php">
        <ul>
            <li>
                <div class="formspace">Id Customer: 
                    <input name="iduser" type="text" value="<?php echo $row['iduser'];?>" readonly>
                </div>
            </li>
            <li>
                <div class="formspace">Full Name: 
                    <input name="fname" type="text" value="<?php echo $row['fname'];?>" required>
                </div>
            </li>
            <li>
                <div class="formspace">User Name: 
                    <input name="username" type="text" value="<?php echo $row['username'];?>" readonly>
                </div>
            </li>
            <li>
                <div class="formspace">Email: 
                    <input name="email" type="text" value="<?php echo $row['email'];?>" required>
                </div>
            </li>
            <li>
                <div class="formspace">Phone Number: 
                    <input name="phnumber" type="text" value="<?php echo $row['phnumber'];?>" required>
                </div>
            </li>
            <li>
                <div class="formspace">Password: 
                    <input name="password" type="text" value="<?php echo $row['password'];?>" required>
                </div>
            </li>
        </ul>
        <div class="btnspace">
            <input name="updateb" class="btn" type="submit" value="Update">
            <button name="rbuttton" class="btn" type="reset">Revert</button>
            <button name="gbbutton" class="gbbtn" type="button" onclick="location.href='userprofilemain.php';">Go Back</button>
        </div>
    </form>
    <?php
    } else {
        echo "No data";
    }
    ?>
    
</body>
</html>
