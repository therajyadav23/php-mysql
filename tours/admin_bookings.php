<?php
session_start();

$conn = new mysqli("localhost", "root", "", "travelindia" );
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// DELETE booking if requested (use prepared statement)
if (isset($_GET['delete_id'])) {
    $del_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_bookings.php");
    exit;
}

// Build search query (use prepared statement for safety)
$search = "";
$params = [];
$types = "";
if (!empty($_GET['search'])) {
    $s = $_GET['search'];
    $search = "WHERE 
        full_name LIKE ? OR 
        phone LIKE ? OR 
        email LIKE ? OR 
        package_name LIKE ? OR 
        travel_date LIKE ?";
    $like_s = "%$s%";
    $params = [$like_s, $like_s, $like_s, $like_s, $like_s];
    $types = "sssss";
}

$sql = "SELECT * FROM bookings $search ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel | All Bookings</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f4f6f9;
        padding: 30px;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #222;
    }
    .search-container {
        text-align: center;
        margin-bottom: 20px;
    }
    .search-container input {
        padding: 8px 12px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-right: 8px;
    }
    .search-container button {
        padding: 8px 14px;
        background: #ff5722;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
        font-size: 14px;
    }
    th {
        background: #ff5722;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    .delete-btn {
        background: #e74c3c;
        color: #fff;
        padding: 6px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 13px;
    }
    .delete-btn:hover {
        background: #c0392b;
    }
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

<h2>📋 All Trip & Booking Records</h2>

<div class="search-container">
    <form method="get" action="">
        <input type="text" name="search" placeholder="Search by name, phone, package, date..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
        <button type="submit">Search</button>
        <button type="button" onclick="window.location.href='admin_bookings.php'">Clear</button>
    </form>
</div>

<div class="container">
    <a href="admin.php" class="back-btn">Back to Admin Panel</a>

    <?php if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Package</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Travellers</th>
                <th>Travel Date</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['package_name']); ?></td>
                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['travelers']); ?></td>
                <td><?php echo htmlspecialchars($row['travel_date']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                <td>
                    <a class="delete-btn" href="admin_bookings.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this booking?');">
                        Delete
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php else: ?>
    <p>No booking records found!</p>
    <?php endif; ?>
</div>

<?php $conn->close(); ?>

</body>
</html>