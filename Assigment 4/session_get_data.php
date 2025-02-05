<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
        } else {
            echo "No data received.";
            exit;
        }
        echo "Username:".$username."<br>";
        echo "Password:".$password."<br>";

        ?>
</body>
        <style>
            body{
                display:flex;
                text-align:left;
                justify-content:left;
                font-size:30px;
            }
        </style>
</html>