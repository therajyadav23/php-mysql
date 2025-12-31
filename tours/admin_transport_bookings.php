<?php
// admin_transport_bookings.php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "travelindia");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all transport bookings
$sql = "SELECT * FROM Tsbookings ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel – Transport Bookings</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f1f1f1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #333; color: #fff; }
        tr:nth-child(even) { background: #fafafa; }
        .container { max-width: 1200px; margin: auto; }
        h1 { text-align: center; color: #222; }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .back-btn:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        .back-btn:before {
            content: '← ';
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Transport Bookings</h1>
    <a href="admin.php" class="back-btn">Back to Admin Panel</a>

    <?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>From City</th>
                <th>To City</th>
                <th>Date</th>
                <th>Passengers</th>
                <th>Vehicle Class</th>
                <th>Contact</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['from_city']); ?></td>
                <td><?php echo htmlspecialchars($row['to_city']); ?></td>
                <td><?php echo htmlspecialchars($row['travel_date']); ?></td>
                <td><?php echo htmlspecialchars($row['passengers']); ?></td>
                <td><?php echo htmlspecialchars($row['vehicle_class']); ?></td>
                <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>

</div>

</body>
</html>
<?php
$conn->close();
?>
