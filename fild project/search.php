<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donor</title>
    <style>
/* Global Styles */
   {
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
    </style>    
</head>
<body>
    <h2>Search for Donors</h2>
    <form method="post">
        <label>Blood Group:</label><br>
        <select name="blood_group" required>
            <option value="A+">A+</option><option value="A-">A-</option>
            <option value="B+">B+</option><option value="B-">B-</option>
            <option value="O+">O+</option><option value="O-">O-</option>
            <option value="AB+">AB+</option><option value="AB-">AB-</option>
        </select><br><br>
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

        <label>City:</label><br>
        <input type="text" name="city"><br><br>

        <button type="submit">Find Donors</button>
    </form>
    <br>
    <a href="index.php">
        <button type="button">Back to Home</button>
    </a>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blood_group = $_POST['blood_group'];
        $city = $_POST['city'];

        $sql = "SELECT * FROM donors WHERE blood_group='$blood_group'";
        if (!empty($city)) {
            $sql .= " AND city LIKE '%$city%'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Available Donors:</h3>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>Name</th><th>Age</th><th>Date Of Birth</th><th>City</th><th>Phone</th><th>State</th>
            <th>District</th><th>Gender</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['city']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['state']}</td>
                        <td>{$row['district']}</td>
                        <td>{$row['gender']}</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:red;'>No donors found.</p>";
        }
    }
    ?>
</body>
</html>
