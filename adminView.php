<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Viewing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Back button styles */
        .back-button {
            display: block;
            margin-top: 20px; /* Adjust the margin as needed */
            color: #000; /* Black text color */
            text-decoration: none;
        }
        
        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        session_start();

            if(isset($_SESSION["id"]))
            {
                $userid = $_SESSION["id"];
            }

            $con1=mysqli_connect("localhost", "root", "","event") or die("Cannot connect to server.".mysqli_error($con));
            $sql1="SELECT * FROM participants WHERE iduser ='$userid' ";
            $result1=mysqli_query($con1, $sql1) or die("Cannot execute sql.");   
            $row=mysqli_fetch_array($result1,MYSQLI_BOTH);
        
           
    ?>
    <h1>Information</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Fullname</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Event</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect("localhost", "root", "", "event") or die("Cannot connect to server." . mysqli_error($con));

            $sql = "SELECT p.iduser, p.fname, p.username, p.email, p.phnumber, r.eventname, r.category FROM participants p JOIN registerevent r ON p.username = r.username;";
            $result = mysqli_query($con, $sql) or die("Cannot execute sql.");

            $num = 1;

            while ($ww = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>" . $ww['iduser'] . "</td>";
                echo "<td>" . $ww['fname'] . "</td>";
                echo "<td>" . $ww['username'] . "</td>";
                echo "<td>" . $ww['email'] . "</td>";
                echo "<td>" . $ww['phnumber'] . "</td>";
                echo "<td>" . $ww['eventname'] . "</td>";
                echo "<td>" . $ww['category'] . "</td>";
                echo "<td><a href='adminDelete.php?id=" . $ww['username'] . "'>Delete</a></td>";
                echo "</tr>";
                $num = $num + 1;
            }
            ?>
        </tbody>
    </table>

    <a href="admin_dashboard.php" class="back-button">Back to Main Page</a>
</body>
</html>
