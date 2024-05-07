<!DOCTYPE html>
<html>
<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "event") or die("Cannot connect to server." . mysqli_error($con));

    $iduser = $_POST["iduser"];
    $fname = $_POST["fname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phnumber = $_POST["phnumber"];
    $password = $_POST["password"];

    // Check if the username already exists for a different user
    $query = "SELECT * FROM participants WHERE username='$username' AND iduser != '$iduser'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        // Check if the email already exists for a different user
        $query = "SELECT * FROM participants WHERE email='$email' AND iduser != '$iduser'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            // Check if the phone number already exists for a different user
            $query = "SELECT * FROM participants WHERE `phnumber`='$phnumber' AND iduser != '$iduser'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 0) {
                // Update user information
                $update_sql = "UPDATE participants SET `password`='$password', `fname`='$fname', `username`='$username', `email`='$email', `phnumber`='$phnumber' WHERE iduser='$iduser'";
                $sql_result = mysqli_query($con, $update_sql);

                if ($sql_result) {
                    echo "<script>alert('Update successful');</script>";
                    echo "<script>window.location = 'userprofilemain.php';</script>";
                } else {
                    echo "<script>alert('Error updating " . mysqli_error($con) . "');</script>";
                    echo "<script>window.location = 'userprofilemain.php';</script>";
                }
            } else {
                echo "<script>alert('Phone number already exists for another user');</script>";
                echo "<script>window.location = 'userprofilemain.php';</script>";
            }
        } else {
            echo "<script>alert('Email already exists for another user');</script>";
            echo "<script>window.location = 'userprofilemain.php';</script>";
        }
    } else {
        echo "<script>alert('username already exists for another user');</script>";
        echo "<script>window.location = 'userprofilemain.php';</script>";
    }

    mysqli_close($con);
    ?>
</body>
</html>
