<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: gray;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
<form action="/addToDB" method="post">
    <div class="container">
        <h1>Register</h1>
        <hr>

        <label for="userName"><b>Username</b></label>
        <input type="text" class="input" placeholder="Enter userName" name="userName" id="userName">
        <h2 style="border-radius: 5px; padding: 10px" id="usernameStatus">Status:</h2>

        <label for="password"><b>Password</b></label>
        <input type="password" class="input" placeholder="Enter Password" name="password" id="password">
        <h2 style="border-radius: 5px;  padding: 10px" id="passwordStatus">Status:</h2>

        <label for="name"><b>Name</b></label>
        <input type="text" class="input" placeholder="Enter name" name="name" id="name" required>


        <button type="submit" id="submit" disabled class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="/signIn">Sign in</a>.</p>
    </div>
</form>
<script src="js/registration.js"></script>
</body>
</html>
