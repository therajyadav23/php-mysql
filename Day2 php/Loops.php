<html>
    <body>
             
        <?php
        //While loop
       $count = 1;
        while ($count <=5){
        echo " <br> Count is".$count;
        $count++;
        }
        //do while loop
        echo"<hr>";
        $num=1;
        do{
            echo " <br> Do while Number is ".$num;
            $num++;
        }
        while($num <=3); 
        
        //for loop
        echo"<hr>";
        for($i=1;$i<=3;$i++){
        echo "<br> for loop number : ".$i;
    }
        //foreach loop
        echo "<hr>";
        $array = ["Red","Green","Blue","Yellow"];
        foreach($array as $color){
            echo "<br> Color : ".$color;
        }







          ?>
          </body>
       </html>