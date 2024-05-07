    
<?php

    session_start();

        if(isset($_SESSION["id"]))
        {
            $userid = $_SESSION["id"];
        }
    $eventName = $_POST['event'];
    $selectedCategory = $_POST['category'];

    $con1=mysqli_connect("localhost", "root", "","event") or die("Cannot connect to server.".mysqli_error($con));
    $sql1="SELECT * FROM participants WHERE iduser ='$userid' ";
    $result1=mysqli_query($con1, $sql1) or die("Cannot execute sql.");   
    $row=mysqli_fetch_array($result1,MYSQLI_BOTH);

    $username = $row[2];

    // Perform database operations (You may need to customize this based on your database structure)
    $con = mysqli_connect("localhost", "root", "", "event");

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into the database (Example query, adjust based on your database structure)
    $sql = "INSERT INTO registerevent (username,eventname, category) VALUES ('$username','$eventName', '$selectedCategory')";

    if (mysqli_query($con, $sql)) {
        $confirmationMessage = "Thank you for registering for the event!";
        // Redirect to the main page after a delay
        echo "<script>
                alert('$confirmationMessage');
                setTimeout(function() {
                    window.location.href = 'userprofilemain.php';
                    }, 2000); // 2000 milliseconds = 2 seconds
                </script>";
    } else {
        $confirmationMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    echo $confirmationMessage;
?>