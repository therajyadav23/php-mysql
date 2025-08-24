<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donor</title>
    <link rel="stylesheet" href="style.css">
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
            echo "<tr><th>Name</th><th>Age</th><th>City</th><th>Phone</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['city']}</td>
                        <td>{$row['phone']}</td>
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
