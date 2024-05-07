
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4; /* Set your desired background color here */
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .col-form-label {
            font-weight: bold;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .form-control-plaintext {
            border: none; 
            background-color: #f8f9fa; 
            padding: 8px; 
            font-size: 16px; 
            color: #495057; 
            margin-bottom: 10px; 
            width: 100%; 
        }
    </style>
</head>
<body>
    <?php
    $event = $_GET['id'];
    ?>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form name="form1" action="adminAddCategory2.php" method="post">
                <h1>Event Information</h1>
                <div class="mb-3 row">
                    <label for="event" class="col-sm-2 col-form-label"><b>Event Name:</b></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name="event" id="event" value="<?php echo "$event"; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category" class="col-sm-2 col-form-label"><b>New Category:</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category" name="category" placeholder="eg: Category 1">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="quota" class="col-sm-2 col-form-label"><b>Quota</b></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="quota" name="quota" placeholder="eg: 123">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Add Category</button>
                    <a href='adminAddCategory.php'><button type='button' class='btn btn-success'>Back</button></a>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
