<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to send an enquiry.'); window.location.href='login.php';</script>";
    exit;
}

// Connect to database
$conn = new mysqli("localhost","root","","travelindia");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get logged in user ID
$user_id = intval($_SESSION['user_id']);

// Get user's email from users table
$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('User not found, please login again.'); window.location.href='login.php';</script>";
    exit;
}

$user = $result->fetch_assoc();
$user_email = $conn->real_escape_string($user['email']);
$stmt->close();

// Get message
$message = $conn->real_escape_string($_POST['message'] ?? '');

if (!$message) {
    echo "<script>alert('Message cannot be empty.'); history.back();</script>";
    exit;
}

// Insert enquiry
$sql = "INSERT INTO enquiries (user_id, user_email, message)
        VALUES ('$user_id', '$user_email', '$message')";

if ($conn->query($sql)) {
    echo "<script>alert('Enquiry sent successfully!'); window.history.back();</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
