<?php include 'userdb.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login – Blood Donor Directory</title>
</head>
<body>
  <div class="card">
    <h2>Login</h2>
    <form method="POST" action="login.php">
     <label for="username">username</label>
      <input type="text" id="username" name="username"required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      
      <button type="submit" class="btn">Login</button>
    </form>
    <div class="link">
      Don’t have an account? <a href="register.html">Register</a>
    </div>
  </div>
  <style>
    body {
      margin: 0; font-family: Arial, sans-serif;
      background: #0b1020; height: 100vh;
      display: flex; justify-content: center; align-items: center;
      color: #fff;
    }
    .card {
      background: #111830; padding: 30px;
      border-radius: 16px; width: 100%; max-width: 360px;
      box-shadow: 0 8px 25px rgba(0,0,0,.35);
    }
    h2 { text-align: center; margin-bottom: 20px; }
    label { display:block; margin: 10px 0 5px; font-size:14px; color:#9fb0d0; }
    input {
      width:100%; padding:12px; border-radius:8px;
      border:1px solid rgba(255,255,255,.2);
      background:#0c1228; color:#fff;
    }
    input:focus { outline:none; border-color:#5b8cff; }
    .btn {
      margin-top:18px; padding:12px; width:100%;
      border:none; border-radius:8px;
      background: linear-gradient(180deg, #5b8cff, #345ce0);
      color:#051022; font-weight:600; cursor:pointer;
    }
    .btn:hover { filter:brightness(1.1); }
    .link { margin-top:12px; text-align:center; font-size:14px; }
    .link a { color:#7be0b5; text-decoration:none; }
  </style>
<?php
session_start();
include 'userdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["email"] = $email;
            header("Location: dashboard.php"); // redirect to donor dashboard
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
    $stmt->close();
    $conn->close();
}
?>


</body>
</html>
