<?php
// save_reservation.php

// Debug errors (optional while testing):
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to database
$conn = new mysqli("localhost", "root", "", "travelindia");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

// Validate and sanitize POST data
$package_name = trim($_POST['package_name'] ?? '');
$full_name    = trim($_POST['full_name'] ?? '');
$phone        = trim($_POST['phone'] ?? '');
$email        = trim($_POST['email'] ?? '');
$travelers    = intval($_POST['travelers'] ?? 0);
$travel_date  = trim($_POST['travel_date'] ?? '');
$message      = trim($_POST['message'] ?? '');

// Basic validation
$errors = [];
if (empty($package_name)) $errors[] = "Package name is required.";
if (empty($full_name)) $errors[] = "Full name is required.";
if (empty($phone)) $errors[] = "Phone is required.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
if ($travelers < 1) $errors[] = "At least 1 traveler is required.";
if (empty($travel_date) || !strtotime($travel_date)) $errors[] = "Valid travel date is required.";

if (!empty($errors)) {
    echo "Validation errors:<br>" . implode("<br>", $errors);
    $conn->close();
    exit;
}

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO bookings (package_name, full_name, phone, email, travelers, travel_date, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssssiss", $package_name, $full_name, $phone, $email, $travelers, $travel_date, $message);

$user_id = intval($_SESSION['user_id']);

// Then in your SQL:
$sql = "INSERT INTO bookings (user_id, package_name, full_name, phone, email, travelers, travel_date, message)
        VALUES ('$user_id', '$package_name', '$full_name', '$phone', '$email', '$travelers', '$travel_date', '$message')";

if ($stmt->execute()) {
    // Success: Redirect or alert
    echo "<script>alert('Reservation saved successfully!'); window.location.href='index.html';</script>";
} else {
    echo "Error saving reservation: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>