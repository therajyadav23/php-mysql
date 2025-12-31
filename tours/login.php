<?php
session_start();
$conn = new mysqli("localhost","root","","travelindia");
if ($conn->connect_error) die("DB Error");

/* ================= LOGIN ================= */
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
       if (password_verify($pass, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: index.html");
    }
    exit;
}
        else {
            echo "<script>alert('Incorrect password');</script>";
        }
      } else {
          echo "<script>alert('Email not found');</script>";
      }
  } 

/* ================= SIGNUP ================= */
if (isset($_POST['signup'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$email,$pass);

    if ($stmt->execute()) {
        echo "<script>alert('Account created successfully! Please login');</script>";
    } else {
        echo "<script>alert('Email already exists');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login & Sign Up</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" id="container">

<!-- SIGN UP -->
<div class="form-container sign-up-container">
<form method="POST">
<h1>Create Account</h1>
<input type="text" name="name" placeholder="Name" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<button name="signup">Sign Up</button>
</form>
</div>

<!-- LOGIN -->
<div class="form-container sign-in-container">
<form method="POST">
<h1>Login</h1>
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<button name="login">Login</button>
</form>
</div>

<!-- OVERLAY -->
<div class="overlay-container">
<div class="overlay">

<div class="overlay-panel overlay-left">
<h1>Welcome Back!</h1>
<p>To keep connected, please login</p>
<button class="ghost" id="signIn">Login</button>
</div>

<div class="overlay-panel overlay-right">
<h1>Hello, Friend!</h1>
<p>Enter your details and start your journey</p>
<button class="ghost" id="signUp">Sign Up</button>
</div>

</div>
</div>

</div>

<script src="script.js"></script>
</body>
</html>
