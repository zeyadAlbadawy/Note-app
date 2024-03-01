<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Sign in Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="signup-form">
    <?php
session_start();

// Redirect user to dashboard if already logged in
if(isset($_SESSION['id'])) {
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
    if($user) {
        if($password === $user['password']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Incorrect email or password.";
        }
    } else {
        $error_message = "Incorrect email or password.";
    }
}

    ?>
    <form action="login.php" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-8 offset-4">
                <h2>Sign In</h2>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-4">Email Address</label>
            <div class="col-8">
                <input type="email" class="form-control" name="email" required="required" placeholder="Enter Email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-4">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" name="password" required="required" placeholder="Enter Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-8 offset-4">
                <button type="submit" class="btn btn-primary btn-lg" name="login">Sign In</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
