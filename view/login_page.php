<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="post" action="/verifyUser">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>" name="username" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" name="password" id="password" placeholder="Enter password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Log in</button>
        <a href="/signUp" class="btn btn-default" >Sign up</a>
    </form>

</div>
</body>
</html>
