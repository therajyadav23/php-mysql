<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Donor</title>
</head>
<body>
    <h2>Donor Registration</h2>

    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" min="0" required><br><br>
        
        <label>Date of Birth:</label>
        <input type="date" name="dob" required><br><br>

        <label>Gender:</label>
        <select name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>

        <label>Blood Group:</label>
        <select name="blood_group">
            <option>A+</option><option>A-</option>
            <option>B+</option><option>B-</option>
            <option>O+</option><option>O-</option>
            <option>AB+</option><option>AB-</option>
        </select><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br><br>

        <label>State:</label>
       <select name="state">
            <option>Maharashtra</option><option>Andhra Pradesh</option>
            <option>Uttar Pradesh</option><option>Bihar</option>
            <option>Gujarat</option><option>Chhattisgarh</option>
            <option>Punjab</option><option>Manipur</option>
            <option>Haryana</option><option>Odisha</option>
            <option>Himachal Pradesh</option><option>Bihar</option>
            <option>Madhya Pradesh</option><option>Sikkim</option>
            <option>Rajasthan</option><option>Tamil Nadu</option>
        </select><br><br>

        <label>District:</label>
        <input type="text" name="district" required><br><br>

        <label>City:</label>
        <input type="text" name="city" required><br><br>

        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="index.php">
        <button type="button">Back to Home</button>
    </a>

<?php
if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $age      = $_POST['age'];
    $dob      = $_POST['dob'];
    $gender   = $_POST['gender'];
    $blood    = $_POST['blood_group'];
    $phone    = $_POST['phone'];
    $state    = $_POST['state'];
    $district = $_POST['district'];
    $city     = $_POST['city'];

    $sql = "INSERT INTO donors (name, age,dob,gender, blood_group, phone,state, district, city)
            VALUES ('$name', '$age','$dob','$gender', '$blood', '$phone', '$state', '$district', '$city')";

    if ($conn->query($sql)) {
        echo "<script>
                alert('Donor registered successfully!');
                window.location.href = 'index.php'; // redirect to home after alert
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
              </script>";
    }
}
?>
<footer>
        © 2025 Blood Donor Directory | Designed for Healthcare Support
    </footer>
    <style>
        /* Reset and base styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Arial, sans-serif;
}

body {
  background: linear-gradient(135deg, #fff5f5 0%, #f7fafc 100%);
  color: #222;
  min-height: 100vh;
}

h2 {
  text-align: center;
  color: #c1121f;
  margin-top: 40px;
  margin-bottom: 30px;
  font-size: 2.2rem;
  letter-spacing: 1px;
}

form {
  background: #fff;
  max-width: 480px;
  margin: 0 auto;
  padding: 32px 32px 24px 32px;
  border-radius: 18px;
  box-shadow: 0 6px 32px rgba(0,0,0,0.08);
  margin-bottom: 32px;
}

form label {
  display: block;
  margin-bottom: 7px;
  font-weight: 500;
  color: #9a031e;
  letter-spacing: 0.5px;
}

form input[type="text"],
form input[type="number"],
form input[type="date"],
form select {
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 18px;
  border: 1px solid #e0e0e0;
  border-radius: 7px;
  font-size: 1rem;
  background: #f9f9f9;
  transition: border 0.2s;
}

form input[type="text"]:focus,
form input[type="number"]:focus,
form input[type="date"]:focus,
form select:focus {
  border: 1.5px solid #c1121f;
  outline: none;
  background: #fff;
}

form button[type="submit"] {
  width: 100%;
  background: #c1121f;
  color: #fff;
  padding: 12px 0;
  border: none;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
  margin-top: 8px;
}

form button[type="submit"]:hover {
  background: #9a031e;
}

a {
  display: flex;
  justify-content: center;
  text-decoration: none;
  margin-bottom: 24px;
}

a button[type="button"] {
  background: #fff;
  color: #c1121f;
  border: 2px solid #c1121f;
  padding: 10px 28px;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.2s, color 0.2s;
}

a button[type="button"]:hover {
  background: #c1121f;
  color: #fff;
}

footer {
  /* Add to your style block or style.css */
body {
  /* ...existing code... */
  padding-bottom: 80px; /* Add enough space for the footer */
}
}

/* Responsive */
@media (max-width: 600px) {
  form {
    padding: 18px 8px 16px 8px;
    max-width: 98vw;
  }
  h2 {
    font-size: 1.4rem;
    margin-top: 24px;
    margin-bottom: 16px;
  }
  footer {
    font-size: 0.95rem;
    padding: 12px 0 8px 0;
  }
}
</body>
</html>