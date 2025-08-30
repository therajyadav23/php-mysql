<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <style>
    /* ...existing code... */
.profile {
  background: #fff;
  max-width: 1100px;
  margin: 40px auto 32px auto;
  padding: 32px 28px 28px 28px;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.12);
  color: #222;
}

.profile h2 {
  color: #c1121f;
  margin-bottom: 28px;
  font-size: 2rem;
  letter-spacing: 1px;
}

.profile table {
  width: 100%;
  border-collapse: collapse;
  background: #f9f9f9;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  margin-bottom: 18px;
}

.profile th, .profile td {
  border: 1px solid #e0e0e0;
  padding: 12px 10px;
  text-align: center;
}

.profile th {
  background: #c1121f;
  color: #fff;
  font-weight: 600;
  font-size: 1.05rem;
}

.profile tr:nth-child(even) {
  background: #fff5f5;
}

.profile tr:hover {
  background: #ffe5e5;
  transition: background 0.2s;
}

.back-link {
  display: inline-block;
  margin-top: 10px;
  color: #c1121f;
  text-decoration: none;
  font-weight: 500;
  background: #fff5f5;
  padding: 8px 22px;
  border-radius: 7px;
  border: 1px solid #c1121f;
  transition: background 0.2s, color 0.2s;
}

.back-link:hover {
  background: #c1121f;
  color: #fff;
}

@media (max-width: 800px) {
  .profile {
    padding: 12px 2vw 12px 2vw;
    max-width: 99vw;
  }
  .profile table, .profile th, .profile td {
    font-size: 0.95rem;
    padding: 7px 3px;
  }
}
  </style>
</head>
<body>
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
    <a href="index.php" class="back-link">⬅ Back to Home</a>
  </div>
</body>
</html>