<?php
include 'db.php';

// Default sorting
$orderBy = "id DESC";

// Handle sorting option
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    switch ($sort) {
        case "name_asc":
            $orderBy = "name ASC";
            break;
        case "name_desc":
            $orderBy = "name DESC";
            break;
        case "age_asc":
            $orderBy = "age ASC";
            break;
        case "age_desc":
            $orderBy = "age DESC";
            break;
        case "blood_group":
            $orderBy = "blood_group ASC";
            break;
        default:
            $orderBy = "id DESC";
    }
}

$sql = "SELECT * FROM donors ORDER BY $orderBy";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Donors</title>
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

    <!-- Filter & Sort Controls -->
    <div class="controls">
      <form method="GET" action="">
        <input type="text" id="searchBox" placeholder="🔍 Search donors..." onkeyup="filterTable()">
        <select name="sort" id="sort" onchange="this.form.submit()">
          <option value="">Sort By (Default)</option>
          <option value="name_asc" <?php if(isset($sort)&&$sort=="name_asc") echo "selected"; ?>>Name (A–Z)</option>
          <option value="name_desc" <?php if(isset($sort)&&$sort=="name_desc") echo "selected"; ?>>Name (Z–A)</option>
          <option value="age_asc" <?php if(isset($sort)&&$sort=="age_asc") echo "selected"; ?>>Age (Youngest First)</option>
          <option value="age_desc" <?php if(isset($sort)&&$sort=="age_desc") echo "selected"; ?>>Age (Oldest First)</option>
          <option value="blood_group" <?php if(isset($sort)&&$sort=="blood_group") echo "selected"; ?>>Blood Group</option>
        </select>
      </form>
    </div>

    <?php
      if ($result && $result->num_rows > 0) {
          echo "<div class='table-wrapper'>";
          echo "<table id='donorTable'>";
          echo "<thead>
                  <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>State</th>
                    <th>District</th>
                    <th>City</th>
                  </tr>
                </thead>
                <tbody>";
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
          echo "</tbody></table>";
          echo "</div>";
      } else {
          echo "<p>No donors found.</p>";
      }
    ?>
  </div>

  <style>
/* General Styles */
* {
  margin: 0; padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Arial, sans-serif;
}
body {
  background: #f4f6f9;
  color: #333;
  padding: 20px;
}

/* Navbar */
nav {
  display: flex;
  background: #c1121f;
  padding: 12px 20px;
  border-radius: 10px;
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
  transition: background 0.3s, transform 0.2s;
}
nav .links a:hover {
  background: #fff5f5;
  color: #c1121f;
  transform: scale(1.05);
}

/* Profile Section */
.profile {
  max-width: 1100px;
  margin: 30px auto;
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}
.profile h2 {
  text-align: center;
  color: #c1121f;
  margin-bottom: 20px;
  font-size: 1.8rem;
}

/* Controls */
.controls {
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-bottom: 20px;
}
.controls input, .controls select {
  padding: 10px 14px;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: none;
  transition: border 0.3s;
}
.controls input:focus, .controls select:focus {
  border: 1px solid #c1121f;
  box-shadow: 0 0 6px rgba(193,18,31,0.3);
}

/* Table */
.table-wrapper {
  overflow-x: auto;
}
table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 10px;
  overflow: hidden;
}
table thead {
  position: sticky;
  top: 0;
  background: #c1121f;
  color: white;
}
table th, table td {
  padding: 12px 14px;
  text-align: left;
}
table tbody tr {
  transition: background 0.2s;
}
table tbody tr:nth-child(even) {
  background: #fafafa;
}
table tbody tr:hover {
  background: #ffe5e5;
}
  </style>

  <script>
  // Client-side search filter
  function filterTable() {
    let input = document.getElementById("searchBox");
    let filter = input.value.toLowerCase();
    let rows = document.querySelectorAll("#donorTable tbody tr");
    rows.forEach(row => {
      let text = row.innerText.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  }
  </script>

</body>
</html>
