<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "navbar.php"; ?>
    <title>Notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.4.1/flatly/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            /* Adjust button padding */
            font-size: 16px;
            /* Adjust button font size */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: auto;
            /* Center the card */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            /* Stack items vertically */
            align-items: center;
            /* Center items horizontally */
            padding: 20px;
            text-align: center;
        }

        .btn {
            width: 80%;
            /* Adjust button width */
            padding: 10px 0;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            width: 80%;
        }

        .btn-group .btn {
            flex-grow: 1;
            margin: 0 5px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 80%;
            /* Adjust button width */
            margin: 0 auto;
            /* Center the button */
            padding: 10px 0;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .container-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
    </style>
</head>

<body>
    <?php include "database.php" ?>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST["title"];
        $textBox = $_POST['textBox'];


        if (!empty($title) && !empty($textBox)) {
            $mySql = "INSERT INTO users (title, textBox) VALUES (?,?) ";
            $stmt = mysqli_stmt_init($connection);
            $prep = mysqli_stmt_prepare($stmt, $mySql);
            if ($prep) {
                mysqli_stmt_bind_param($stmt, "ss", $title, $textBox);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Note Added Successfully</div>";
            } else {
                die("SomeThing Went Wrong");
            }
        }
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter note title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="margin-top: 20px;">Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Enter your note here..." name="textBox"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 20px; border-radius: 5px;" name="submit">Save Note</button>
        </div>
    </form>
    <?php
    $sql = "SELECT * FROM users";
    $res = mysqli_query($connection, $sql);
    while ($fetch = mysqli_fetch_assoc($res)) {
        echo '<div class="container-card">
          <div class="card" style="margin: 20px; padding-left: 10px; padding-right: 10px;">
            <div class="card-body">
                <h5 class="card-title">' . $fetch['title'] . '</h5>
                <p class="card-text">' . $fetch['textBox'] . '</p>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary" style="border-radius: 10px;">Edit</a>
                    <a href="delete.php?id='.$fetch['id'].'" class="btn btn-danger" style="border-radius: 10px;" name="delete">Delete</a>
                </div>
            </div>
            </div>
        </div>';
    }
    ?>
    <!-- <div class="container-card">
        <div class="card" style="margin: 20px; padding-left: 10px; padding-right: 10px;">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="btn-group">
                    <a href="#" class="btn btn-primary" style="border-radius: 10px;">Edit</a>
                    <a href="#" class="btn btn-danger" style="border-radius: 10px;">Delete</a>
                </div>
            </div>
        </div>
    </div> -->


</body>

</html>