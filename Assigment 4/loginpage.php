<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body bgcolor="#d1dee8">
    </div>
    <?php
    if(isset($_SESSION["user"])){
        header("session_get.data.php");
    exit();
    }
    ?>

    <div>
    <h1 style="color:blue"><b><u>Login Form</u></b></h1> 
    <form action="session_get_data.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required><br><br>
        
        <input type ="submit" value="Login">
        <style>body {
            background-color: #d1dee8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h1 {
            color: #007BFF;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        </style>
</form>
</bod>
</html>
