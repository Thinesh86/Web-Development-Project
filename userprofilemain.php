<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants Main Menu</title>
    <link rel="stylesheet" href="./css/userprofilemain.css">

</head>

    <body>  
    <?php $iduser = $_SESSION["id"]; ?>
    <?phpif(isset(  $iduser ) ){ ?>
        
    <?php
        $con=mysqli_connect("localhost", "root", "","event") or die("Cannot connect to server.".mysqli_error($con));
        $sql="SELECT * FROM participants WHERE iduser ='$iduser' ";
        $result=mysqli_query($con, $sql) or die("Cannot execute sql.");   
        $row=mysqli_fetch_array($result,MYSQLI_BOTH);

        ?>
        
   
        <div class="topbar">
            <nav>
                <h1 class = logo>Nexus Digital</h1>
                <ul>
                    <li><a href="userview.php">Profile</a></li>
                    <li><a href="user.register.php">Register your event</a></li>
                    <li><a href="viewevent.php">View your event</a></li>
                </ul>  

                
                <h2>hello <?php echo" $row[2]";?></h2>   
                         

                <button name="logout" type="button" onclick="location.href = 'logoutuser.php';" > logout</button>
            </nav>
        </div>
   
        <?  } else{
            echo"please login";
        }?>
    </body>     
</html>