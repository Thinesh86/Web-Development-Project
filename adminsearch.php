<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Participant</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }

        .form-container {
            padding: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form name="form1" action="adminsearch2.php" method="post" onsubmit="return checkRegister();">
                <h1>Search Participant</h1>
                
                <div class="mb-3">
                    <label for="search"><b>Search</b></label>
                    <input type="text" id="search" name="search" placeholder="Username/Fullname" required>
                </div>
                
                <div>
                    <button type="submit">Search</button>
                </div>
            </form>
            <a href='admin_dashboard.php'><button type='button'>Back</button></a>
        </div>
    </div>
</body>
</html>
