<?php
$host = "localhost";
$user = "root";       // change if your MySQL user is different
$pass = "";           // put your MySQL password
$dbname = "blood_donor_db";

$conn = new mysqli($host, $user, $pass, $dbname,);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
