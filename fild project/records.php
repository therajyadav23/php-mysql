<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
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
  <br><br>
  <div class="profile">
    <h2>All Registered Donors</h2>
    <?php
      $sql = "SELECT * FROM donors ORDER BY id DESC";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
          echo "<table>";
          echo "<tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Date Of Birth</th>
                  <th>Gender</th>
                  <th>Blood Group</th>
                  <th>Phone</th>
                  <th>State</th>
                  <th>District</th>
                  <th>City</th>
                </tr>";
          while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['name']}</td>
                      <td>{$row['age']}</td>
                      <td>{$row['dob']}</td>
                      <td>{$row['gender']}</td>
                      <td>{$row['blood_group']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['state']}</td>
                      <td>{$row['district']}</td>
                      <td>{$row['city']}</td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p>No donors found.</p>";
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
  background: #f9f9f9;
  color: #333;
  padding: 20px;
}
nav {
  display: flex;
  background: #c1121f;
  padding: 12px 20px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
nav .links {
  margin-left: auto;
  display: flex;
  gap: 18px;
}
nav .links a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  padding: 8px 12px;
  border-radius: 6px;
  transition: background 0.3s, color 0.3s;
}
nav .links a:hover {
  background: #fff5f5;
  color: #ff0011;
}

.profile {
  max-width: 1000px;
  margin: 0 auto;
  background: #fff;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.profile h2 {
  text-align: center;
  color: #c1121f;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
table th, table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

table th {
  background: #f4f4f4;
}
table tr:nth-child(even) {
  background: #f9f9f9;
}
table tr:hover {
  background: #ffe5e5;
  transition: background 0.2s;
}
.back-link {
  display: inline-block;
  margin-top: 10px;
  text-decoration: none;
  color: #c1121f;
  font-weight: bold;
}
.back-link:hover {
  text-decoration: underline;
}
form {
  max-width: 400px;
  margin: 20px auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
form label {  
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #555;
}
  </style>

</body>
</html>