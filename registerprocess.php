<?php
session_start();
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// Check if passwords match
if ($password != $password2) {
    echo "<script>alert('Passwords do not match');</script>";
    echo "<script>window.location = 'register.html';</script>";
    exit; // Stop execution if passwords don't match
}


$servername = "localhost";
$dbuser = "root";
$pwd = "";
$dbname = "event";

$conn = mysqli_connect($servername, $dbuser, $pwd, $dbname);

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
} else {

    $sql = "SELECT * FROM participants WHERE username ='$username'";
    $result = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM participants WHERE email ='$email'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists');</script>";
        echo "<script>window.location = 'register.html';</script>";
    } elseif (mysqli_num_rows($result1) > 0) {
        echo "<script>alert('Email has already been used');</script>";
        echo "<script>window.location = 'register.html';</script>";
    } else {
        // Insert new participant into the database with hashed password
        $sql2 = "INSERT INTO participants(fname, username, email, phnumber, password) VALUES ('$fullname','$username','$email','$phoneNumber','$password')";
        $result2 = mysqli_query($conn, $sql2) or die("Could not perform the query");

        echo "<script>alert('You have successfully registered');</script>";
        echo "<script>window.location = 'login.html';</script>";
    }
}
?>
