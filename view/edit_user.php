<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body>

<div class="container">
    <h2>Edit User</h2>
    <form class="form-horizontal" action="/updateUser/<?php echo $data['id'] ?>" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="userName">Username:</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $data['userName'] ?>" class="form-control" id="userName" placeholder="Enter UserName" name="userName">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="<?php echo $data['name'] ?>" placeholder="Enter Name" name="name">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Save</button>
            </div>
        </div>
    </form>
    <a href="" onclick="deleteUser(<?php echo $data['id'] ?> )" >Delete User</a>

</div>
<script src="/js/delete.js"></script>
</body>
</html>
