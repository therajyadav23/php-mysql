<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
<div class="form">
    <h1>Student Form</h1>
    <form action="IntegratingMySQL.php" method="post">

        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="login_id">login id :</label>
        <input type="text" id="login_id" name="login_id" required><br><br>

        <label for="password">password :</label>
        <input type="text" id="password" name="password" required><br><br>

        <label for="mobile">Mobile Number:</label>
        <input type="mobile" id="mobile" name="mobile" required><br><br>

        <label for="dob">dob :</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <button type="submit">Submit/Update Data</button>

    </form>     

<?php

$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = mysqli_connect($server_name, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed " . mysqli_connect_error());
}
else{
    // echo "Connection Successful !!";

    echo "<br><br>";
}

$sql_read = "SELECT * from user_details;";
            $result = mysqli_query($conn, $sql_read);
            if(mysqli_num_rows($result) > 0){
                echo "<table border='1'> <tr><th>ID</th><th>Name</th><th>LoginID</th><th>DOB</th><th>Mobile</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                         <td>{$row['name']}</td>
                        <td>{$row['login_id']}</td>
                         <td>{$row['dob']}</td>
                        <td>{$row['mobile']}</td>
                        <td><a href='Deletion_in_MySQL.php?id={$row['id']}'>Delete</a> 
                            <!--<a href='Updation_in_MySQL.php?id={$row['id']}'>Update</a>--></td>
                        </tr>";
                }
                    echo "</table>";
            } else {
            echo "0 results";
            }

            mysqli_close($conn);

?>

</div>
</body>
        <style>
            form{
                display: grid;
                justify-content: center;
                align-items: center;
                font-weight: bold;
                
            }
            h1{
                text-align: center;
            }
            input[type='text'],input[type='email'],input[type='tel']{
                border-color: grey;
                height: 20px;
                width: 300px;
            }
            textarea{
                width: 300px;
                border:2px solid grey;
            }
            body{
                font-size: 20px;
            }
            button {
                background-color:rgb(60, 189, 245);
                border: 2px solid grey ;
                height: 30px;
                font-weight: bold;
                font-size:16px ;

            }   
        </style>

</html>