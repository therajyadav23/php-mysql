<html>
    <body bgcolor="lightgray">
             
        <?php
        //Functions
        function firstFunction(){
            echo "Hello World !";

        }
        firstFunction();
        
        //With Parameter Function
        function greet($name){
            echo "<br>  Hello ".$name;
        }
        greet("Class");

        //With Default Parameter Function
        function defaultParameter ($name="Guest"){
            echo "<br>  Hello ".$name;
        }
        defaultParameter();
        defaultParameter("Default Parameter !");

        //function that return a value
        function multiply($a,$b){
            return $a*$b;
        }
        $result = multiply(8,9);
        echo "<br>".$result;

        //Function by value Example
        echo"<br>";
        function addTen($num){
            $num +=10;
            echo "<br><hr> Function Value : ".$num;
        }
          $x=5;
          addTen($x);
          echo "<br> <hr>Original Value : ".$x;
          echo"<br>";

        //Function by Reference value Example
        function addTenByRefer(&$num){
            $num +=10;
            echo "<br> <hr>Function Value : ".$num;
        }
          $y=5;
          addTen($x);
          echo "<br> <Original Value : ".$y;
          echo"<br>";

          //Function (Conditional Return)
          function checkEvenOdd($num){
            if($num % 2 == 0){
                return "Even";

            }
            return "Odd";
          }
          echo "<br>";
          echo checkEvenOdd(18);
          echo"<br>";
          echo checkEvenOdd(15);











        
        ?>
        </body>
     </html>