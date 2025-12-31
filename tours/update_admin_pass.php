<?php
$conn = new mysqli("localhost","root","","travelindia");
if ($conn->connect_error) die("DB Error");

$new_pass = password_hash("admin", PASSWORD_DEFAULT);
$email = "admin@travelindia.com";

$stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
$stmt->bind_param("ss", $new_pass, $email);
if ($stmt->execute()) {
    echo "Password updated to 'admin'";
} else {
    echo "Error updating password";
}
?>