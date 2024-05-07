<?php

$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$dbuser = "root";
$pwd = "";
$dbname = "event";

$conn = new mysqli($servername, $dbuser, $pwd, $dbname);

if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
    
$query = "SELECT * FROM participants WHERE username = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 0){
    echo "<script>alert('Username error. Try again');</script>";
    echo "<script>window.location = 'login.html';</script>";
}else{
    $comp = $result->fetch_array(MYSQLI_BOTH);
    
    if($comp[5] == $password){
        session_start();
        $_SESSION["id"] = $comp[0];
        header("Location: userprofilemain.php");
    }else{
        echo "<script>alert('Wrong password. Try again');</script>";
        echo "<script>window.location = 'login.html';</script>";
    }
}

$stmt->close();
$conn->close();

?>