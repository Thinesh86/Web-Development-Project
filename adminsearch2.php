<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .no-results {
            text-align: center;
            color: #555;
            font-style: italic;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2188d8;
        }
    </style>
</head>
<body>
    <h1>Participant Information</h1>

    <?php
    $search = $_POST['search'];
    $con = mysqli_connect("localhost", "root", "", "event") or die("Cannot connect to server." . mysqli_error($con));

    $sql = "SELECT * FROM participants WHERE username LIKE '$search%';";
    $result = mysqli_query($con, $sql) or die("Cannot execute sql.");
    $num = 1;

    // Check if there are results
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Customer ID</th>";
        echo "<th>Name</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>Phone</th>";
        echo "<th>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($ww = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>$num</td>";
            echo "<td>" . $ww['iduser'] . "</td>";
            echo "<td>" . $ww['fname'] . "</td>";
            echo "<td>" . $ww['username'] . "</td>";
            echo "<td>" . $ww['email'] . "</td>";
            echo "<td>" . $ww['phnumber'] . "</td>";
            echo "<td><a href='adminDeleteUser.php?id=" . $ww['username'] . "'>Delete</a></td>";
            echo "</tr>";
            $num = $num + 1;
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='no-results'>No user found with the given username.</p>";
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <a href='adminsearch.php'><button type='button'>Search for other participants</button></a>
</body>
</html>
