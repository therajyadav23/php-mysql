<html>
    <body>
        <?php
            //Integrating DB connection MYSQL in php

            //Establish Connection

            $server_name = "localhost";
            $username = "root";
            $password = "";
            $dbname = "student_db";

            $conn = mysqli_connect($server_name, $username, $password, $dbname);

            if(!$conn){
                die("Connection Failed " . mysqli_connect_error());
            }
            else{
                echo "Connection Successful !!";
            }

            $id = $_GET['id']; 

            $sql_delete = "DELETE from user_details where id = $id";

            if(mysqli_query($conn, $sql_delete)){
                echo "<br> Record Deleted Successfully";
                header("Location: Student_form.php");
            }
            else{
                echo "Error ".$sql_delete."<br>".mysqli_error($conn);
            }
            mysqli_close($conn);

        ?>
 </body>
</html>
