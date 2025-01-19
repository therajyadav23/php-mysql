<html>
    <body>
        <?php
        //File Handling Operations
        //Create a new file
        $file = fopen("Student.txt","w");
        //fclose($file);
        echo "File has been created";

        //Write in a new file
        fwrite($file,"Hello Student File !! \n This is test");
        echo "<br> Text has been Inserted";
        fclose($file);

        //Read a File
        $file_read = fopen("Student.txt", "r");
        while(!feof($file_read)){
            echo fgets($file_read)."<br>";
        }

        fclose($file_read);

        //Deleting a file
        if(file_exists("Student.txt")){
            unlink("Student.txt");
            echo "<br><br> File has been deleted !!";
        }

        else{
            echo "<br><br> File not found";
        }
        ?>
        </body>
        </html>
