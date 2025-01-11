<html>
    <body bgcolor="#d1dee8">
        <header>
            <h1> Numeric operations : </h1>
            <h3>Atithmetic Operations: </h3>
        </header>
        <?php

        // a.Arithmetic Operations
        
        //Addition(+)
        $num1=5;
        $num2=2;
        $sum=$num1+$num2;
        echo " <b> Addition </b>: " .$sum;

        //Subtraction(-)
        $num1=15;
        $num2=8;
        $diff=$num1-$num2;
        echo "<br> <b> Subtraction </b> : ".$diff;

        //Multiplication(*)
        $num1=7;
        $num2=1;
        $mul=$num1*$num2;
        echo "<br> <b> Multiplication </b> : ".$mul;

        //Division(/)
        $num1=14;
        $num2=2;
        $div=$num1/$num2;
        echo "<br> <b> Division </b> : ".$div;

        //Modulus(%)
        $num1=23;
        $num2=8;
        $mod=$num1 % $num2;
        echo "<br> <b> Modulus </b> : ".$mod;

        //b. Round up Function
        $num1=6.9;
        echo "<br> Round Up : ".ceil($num1);

        //c. Round down to the nearest integer
        $num1=7.1;
        echo "<br> Round down : ".floor($num1);

        //d. Returns the square root
        $num1=49;
        echo "<br> Returns square root : ".sqrt($num1);

        //e. Generates a random number between $min and $max
        $min=1;
        $max=100;
        echo "<br> Random number: ".rand($min,$max);









        ?>


    </body>
</html>