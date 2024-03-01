<!DOCTYPE html>
<html lang="en">

<head>
    <title>notes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #007bff; 
            border-radius: 0;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #ffffff;
        }

        .navbar-nav li a {
            color: #ffffff;
        }

        .navbar-nav li.active a {
            background-color: #0056b3; 
            border-radius: 5px;
        }

        .navbar-nav li.active a:hover {
            background-color: #00408b; 
        }

        .navbar-form .form-group {
            margin-bottom: 0;
        }

        .navbar-form .form-control {
            border-radius: 20px;
        }

        .navbar-form .btn {
            border-radius: 20px;
            background-color: #ffffff; 
            color: #007bff; 
            border-color: #ffffff; 
        }

        .navbar-form .btn:hover {
            background-color: #f0f0f0; 
            color: #007bff; 
            border-color: #ffffff; 
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">My Notes</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Home</a></li>
            </ul>
            <form class="navbar-form navbar-right" action="/action_page.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                </div>
                <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            </form>
        </div>
    </nav>

</body>

</html>