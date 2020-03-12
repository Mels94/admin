<?php
require_once 'auth/auth.php';
//login();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="card card-outline-secondary">
    <div class="card-header">
        <h3 class="mb-0">Login</h3>
    </div>
    <div class="card-body container">
        <form action="login.php" method="post" class="form" role="form">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success btn-lg float-right" value="Login">
            </div>
        </form>
    </div>
</div>

</body>
</html>