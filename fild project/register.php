<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Donor Registration</h2>

    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" required><br><br>

        <label>Gender:</label>
        <select name="gender">
            <option>Male</option>
            <option>Female</option>
        </select><br><br>

        <label>Blood Group:</label>
        <select name="blood_group">
            <option>A+</option><option>A-</option>
            <option>B+</option><option>B-</option>
            <option>O+</option><option>O-</option>
            <option>AB+</option><option>AB-</option>
        </select><br><br>

        <label>Phone:</label>
        <input type="text" name="phone"><br><br>

        <label>City:</label>
        <input type="text" name="city"><br><br>

        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="index.php">
        <button type="button">Back to Home</button>
    </a>


<?php
if (isset($_POST['submit'])) {
    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];
    $blood  = $_POST['blood_group'];
    $phone  = $_POST['phone'];
    $city   = $_POST['city'];

    $sql = "INSERT INTO donors (name, age, gender, blood_group, phone, city)
            VALUES ('$name', '$age', '$gender', '$blood', '$phone', '$city')";

    if ($conn->query($sql)) {
        echo "<p> Donor registered successfully.</p>";
    } else {
        echo "<p> Error:</p>";
    }
}
?>
</body>
</html>
