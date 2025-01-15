<html>
    <body bgcolor="#d1dee8">
        <header>
            <h2>Q1:</h2>
        </header>
    <?php
    $sum = 0;

// Loop through numbers from 1 to 100
for ($i = 0; $i <= 100; $i++) {
    
    // Check if the number is even
    if ($i % 2 == 0) {

        // Add the even number to the sum
        $sum += $i;
    }
}
echo "The sum of all even numbers between 1 and 100 is: " . $sum;
echo "<hr>";
?>


</body>
</html>

<html>
<body>
    <header>
        <h2>Q2:</h2>
    </header>
    <?php
        
        //Create an Associative array of cities and their populations
        $cities = array("Mumbai" =>21673000, 
                        "Nashik" =>2294000, 
                        "Pune" => 7345850);
        $highestpopulation = array_keys($cities, max($cities))[0];

        echo " The Highest population city is : " .$highestpopulation;
        echo "<hr>";


     ?>


    </body>
</html>