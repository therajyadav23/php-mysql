<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body bgcolor="#d1dee8">
    <div>
    <?php
    if(isset($_POST["Submit"])){
        echo "Feedback submitted.";
    }
    ?>
    </div>

    <div>
    <h1 style="color:blue">Feedback Form</h1> 
    <hr>

    <form action="Feedback_result.php" method="POST">
        <lable for="name">Name:</lable><br>
        <input type="text" id="name" name="name" placeholder="Name" required> <br><br>
        
        <lable for="phone">Mobile Number:</lable><br>
        <input type="text"name='phone' id="phone" placeholder="Mobile Number" required/> <br> <br>
        
        <lable for="email">Email:</lable><br>
        <input type="email"name='email' id="email" placeholder="Email" required/> <br> <br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" cols="50" required></textarea><br><br>

        <input style="color:green" type="submit" value="Submit Feedback">
    
    </div>

</form>
</body>
</html>
