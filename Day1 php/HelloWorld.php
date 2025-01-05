
<html>
    <body>
             
        <?php
        //single line comment
        //echo "Hello World"
        
        echo "HelloWorld";
        
        $name="Raj";
        $age= 19;
        $time= 14.45;
        $class= "true";
       
        
        // compound types
        $student_arr = array("Raj","Punit","Rihaan");
        class student{
            public $marks;

        }
        $stud = new Student();
        $stud->marks= 90;

         //special Types
         $null_var= null;

         echo "<br> String : ", $name;
         echo "<br> Integer : ", $age;
         echo "<br> Float : ", $time;
         echo "<br> Boolean : ", $class;
         echo "<br> Array : " , $student_arr[1];


         //echo "Object : ", $stud;
         echo "Null : " , $null_var;






        /* This is multiple line  comment */

?>
</body>
</html>