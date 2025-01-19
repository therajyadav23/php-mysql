<html>
    <body>
        <?php
        //DirectoryHandlingOperations

        //Create a Directory
       if(!is_dir("phpDay3_Driectory")){
            mkdir("phpDay3_Driectory");
            echo "Driectory Created";
        }
        else{
            echo "Driectory is already exists !";
        }
        echo "<br>";

        //Check if the directory exists
        if(!is_dir("phpDay3_Driectory")){
            echo "Driectory exists";
        }
        else{
            echo "Driectory is not exists !";
        }

        //List the files inside the folder
        $files = scandir("phpDay3_Driectory");
        foreach($files as $file){ 
            echo $file . "<br>";
        }
        echo "<br>";

        //Change the directory
        echo "Current Directory : ". getcwd();
        chdir("phpDay3_Driectory");
        echo "<br> New Current Directory : " . getcwd();
       
        echo"<br>";
         //Delete the files inside the directory
        $deletefiles = scandir(".");
        foreach($deletefiles as $file){
            if ($file !=="." && $file!==".."){
                unlink($file);
            }
            echo "<br> the file was deleted";
        }

        echo"<br>"; 

        //Delete directory
        chdir("..");
        echo "<br> Current Directory : " .getcwd();
        if(is_dir("phpDay3_Driectory")){
            rmdir("phpDay3_Driectory");
            echo "Driectory Removed";
        }
        else{
            echo "<br> Driectory does not exists !";
        }
                               


        


        ?>
    </body>
    </html>