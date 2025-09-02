<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donor</title>
</head>
<body>
  <nav>
    <div class="links">
      <a href="index.php">Home</a>
      <a href="register.php">Donor Register</a>
      <a href="search.php">Find Donor</a>
      <a href="about.php">About Us</a>
      <a href="records.php">Records</a>
    </div>
  </nav>
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
            echo "<h3>Available Donors</h3>";
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
/* Navbar Styles */
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 40px;
  background: #fff;
  box-shadow: 0 2px 8px rgba(0,0,0,0.07);
  position: sticky;
  top: 0;
  z-index: 1000;
  margin-bottom: 32px;
}

nav h1 {
  color: #c1121f;
  font-size: 2rem;
  font-weight: bold;
  letter-spacing: 1px;
}

nav .links {
  margin-left: auto;
  display: flex;
  gap: 18px;
}

nav .links a {
  color: #444;
  text-decoration: none;
  font-weight: 500;
  padding: 8px 12px;
  border-radius: 6px;
  transition: background 0.2s, color 0.2s;
}

nav .links a:hover,
nav .links a.active {
  background: #fff5f5;
  color: #ff0011;
}

h2 {
  text-align: center;
  color: #c1121f;
  margin-top: 4px;
  margin-bottom: 3px;
  font-size: 2.2rem;
  letter-spacing: 1px;
}
h3 {
  text-align: center;
  color: #c1121f;
  margin-top: 24px;
  margin-bottom: 16px;
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
table {
  width: 100%;
  max-width: 900px;
  margin: 0 auto 32px auto;
  border-collapse: collapse;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
table th, table td {
  border: 1px solid #e0e0e0;
  padding: 12px 10px;
  text-align: center;
  font-size: 0.95rem;
  color: #333;
}
table th {
  background: #c1121f;
  color: #fff;
  font-weight: 600;
  font-size: 1.05rem;
}
table tr:nth-child(even) {
  background: #fff5f5;
}
table tr:hover {
  background: #ffe5e5;
  transition: background 0.2s;
}
p {
    text-align: center;
    font-size: 1.1rem;
    color: #555;
    margin-top: 16px;
  }
  p[style] {
    color: red;
    font-weight: 600;
  }
  /* Responsive */
  @media (max-width: 600px) {
    form {
      padding: 24px 20px 20px 20px;
    }
    nav {
      flex-direction: column;
      align-items: flex-start;
      gap: 12px;
    }
    nav .links {
      margin-left: 0;
      flex-wrap: wrap;
      gap: 12px;
    }
    table {
      width: 95%;
      font-size: 0.9rem;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      margin-bottom: 24px;
      max-width: 100%;
      overflow-x: auto;
      display: block;
    }
    table th, table td {
      padding: 10px 6px;
    }
    table th {
      font-size: 1rem;
    }                                                                     
  h2 {
    font-size: 1.4rem;
    margin-top: 24px;
    margin-bottom: 16px;
  }
  p {
    font-size: 1rem;
    margin: 12px 16px;
  }
  }
    </style>    
</body>
</html>
