<?php

function check_admin_login($con)
{
    if (isset($_SESSION['admin_id'])) {
        $id = $_SESSION['admin_id'];
        $query = "SELECT * FROM admin WHERE admin_id = '$id' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $admin_data = mysqli_fetch_assoc($result);
            return $admin_data;
        }
    }

    header("Location: admin_login.php");
    die;
}

?>