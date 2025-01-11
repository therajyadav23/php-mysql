<html>
<body bgcolor="#d1dee8">
<header>
    <h1> String Operations: </h1>
    </header>
     <?php

    // a. Concatenation
    $firstName = "Raj";
    $lastName = "Yadav";
    $fullName = $firstName . $lastName;
    echo "<br> <b> Concatenation </b> : ". $fullName;
    
    // b. String Length
    $stringLength = strlen($fullName);
    echo "<br><hr> <b> String Length </b> : " . $stringLength;
    
    // c. Substring Extraction
    $substring = substr($fullName, 0, 3);
    echo "<br><hr> <b> Substring Extraction </b> : " . $substring;
    
    // d. Case Conversion
    
    echo "<br><hr> <b>Uppercase </b> : ".strtoupper($fullName);
    echo "<br><br> <b>Lowercase </b> : ".strtolower($fullName);
    echo "<br><br> <b>Uppercase First Letter </b> : ".ucfirst($firstName);
    echo "<br><br> <b>Uppercase Words </b> : ".ucwords($fullName);
    
    // e. Trimming
    $string1= "Raj";
    $string2="Yadav";
    $trimmedString = $string1.$string2;
    echo "<br><hr> <b>Trimmed (Both Sides) </b> : " . trim($trimmedString);
    echo "<br> <b>Trimmed (Left) </b> : " . ltrim($string1);
    echo "<br> <b>Trimmed (Right) </b> : " . rtrim($string2);

    // f. Reverse a String
    $stringreversed= strrev($fullName);
    echo "<br><hr> <b> Reversed a String </b> : ".$stringreversed;

    // g. Compares Two strings  




?>
    
    

</body>
</html>