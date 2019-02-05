<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>

    <script src="js/delete.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
    body{
        font-size: 16px;
    }
    </style>
</head>
<body>

<h1>All users</h1>


<table class="table table-hover table-striped">
    <thead>
    <tr>
        <td>ID</td>
        <td>User Name</td>
        <td>First Name</td>
        <td>Action</td>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $user): ?>
        <tr>
            <td><?php echo $user['id'] ?></td>

            <td><a href="/editUser/<?php echo $user['userName'] ?>">
                    <?php echo $user['userName'] ?></a></td>

            <td><?php echo $user['name'] ?></td>

            <td><a class="btn btn-default" href="/editUser/<?php echo $user['userName'] ?>">Edit</a>
                <a class="btn btn-danger" href="" onclick="deleteUser( '<?php echo $user['id']; ?>')"> Delete</a>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
<br/>
<a class="btn btn-success" href="/signUp">Add new user</a>
<a class="btn btn-danger" href="/logOut">Log Out</a>
<hr>
</body>
</html>