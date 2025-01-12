<html>
    <body>
        <?php
       //Arrays and function
       //Array Indexed
       $fruits = ["Apple","Banana","Cherry","Blueberry"];
       echo "Selected Fruit : ".$fruits[1];

       foreach($fruits as $fruit){
        echo "<br> Fruit :".$fruit;
       }
       
       // Associative arrays
       echo "<br>";
       $ages = ["Raj"=>20, "sarvesh"=>20];
       echo "<br> selected Age :".$ages["Raj"];

       foreach($ages as $name => $age){

       echo "<br>".$name." is ".$age." year old. ";
       }
       
       //Multi-dimensional Arrays
       $students=[
        ["Raj",20,true],
        ["Sarvesh",20,true],
        ["Bheem",12,true]
       ];
       echo "<br> student 1 is prsent in the class :".$students[2][0];

       //Array manipulation
       $classroom = ["Raju","Bheem","Nobita"];
    
       //Adding elements
       $classroom[] = "Alen";
       array_push($classroom,"Xavier");
        foreach($classroom as $student){
            echo "<br> <big> <b> Student </b></big>:".$student;
       }
        
       //Updating elements
       echo"<br>";
       $classroom[2] ="Raj";
       foreach($classroom as $student){
            echo "<br>  <big> <b> Student </b></big> :".$student;
       }

       //counting Elements
       echo"<br><br>";
       echo " <big> <b>Number of element in the array are </b></big> : ".count($classroom);

       //Deleting Element
       unset($classroom[1]);
       echo"<br>";
       print_r($classroom);

       //Re-Indexing
       $classroom = array_values($classroom);
       echo "<br>";
       print_r($classroom);






        
    
    
    
    



        ?>
    </body>
 </html>

