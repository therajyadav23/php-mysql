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

            $id= $_POST['id'];
            $name = $_POST['name'];
            $login_id = $_POST['login_id'];
            $password = $_POST['password'];   
            $dob = $_POST['dob'];
            $mobile = $_POST['mobile'];  

            // echo "Name : ". $name;
            // echo "dob : ". $dob;

            $sql_read = "SELECT * from user_details where id = $id;";
            $result = mysqli_query($conn, $sql_read);
            if(mysqli_num_rows($result) == 0){

                //$sql_insert = "INSERT INTO user_details (id, name, login_id, password, dob, mobile) VALUES (1,'John','john548','pass', '2002-02-08 12:34:56', 8548549622);";
                $sql_insert = "INSERT INTO user_details (id, name, login_id, password, dob, mobile) VALUES ($id,'$name', '$login_id','$password', '$dob', $mobile);";

                if(mysqli_query($conn, $sql_insert)){
                    echo "<br> Record Inserted Successfully";
                    header("Location: Student_form.php");
                }
                else{
                    echo "Error ".$sql_insert."<br>".mysqli_error($conn);
                }
            }
            else
            {
                $sql_delete = "DELETE from user_details where id = $id";

                mysqli_query($conn, $sql_delete);

                $sql_insert = "INSERT INTO user_details (id, name, login_id, password, dob, mobile) VALUES ($id,'$name', '$login_id','$password', '$dob', $mobile);";

                if(mysqli_query($conn, $sql_insert)){
                    echo "<br> Record Updated Successfully";
                    header("Location: Student_form.php");
                }
                else{
                    echo "Error ".$sql_insert."<br>".mysqli_error($conn);
                }
            }


            mysqli_close($conn);

        ?>
 </body>
</html>
