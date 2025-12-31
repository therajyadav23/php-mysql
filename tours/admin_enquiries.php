<?php
session_start();

// OPTIONAL admin check
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit;
// }

$conn = new mysqli("localhost","root","","travelindia");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM enquiries ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | Enquiries</title>
<style>
body{font-family:Poppins,sans-serif;background:#f4f6ff;padding:20px;}
table{width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 4px 8px rgba(0,0,0,0.1);}
th,td{padding:12px;border:1px solid #ddd;text-align:left;}
th{background:#007bff;color:#fff;font-weight:600;}
tr:nth-child(even){background:#f9f9f9;}
tr:hover{background:#e3f2fd;}
.mark-btn{background:#fff;color:#333;border:1px solid #ccc;padding:6px 12px;border-radius:4px;cursor:pointer;font-size:14px;}
.mark-btn:hover{background:#f0f0f0;}
.mark-btn.marked{background:#28a745;color:#fff;border-color:#28a745;}
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

<h2>📨 User Enquiries</h2>

<div class="container">
    <a href="admin.php" class="back-btn">Back to Admin Panel</a>
</div>

<table>
<tr>
<th>ID</th>
<th>User Email</th>
<th>Message</th>
<th>Time</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo htmlspecialchars($row['id']); ?></td>
<td><?php echo htmlspecialchars($row['user_email']); ?></td>
<td><?php echo htmlspecialchars($row['message']); ?></td>
<td><?php echo htmlspecialchars($row['created_at']); ?></td>
<td><button class="mark-btn" onclick="markAsRead(this)">Mark as Read</button></td>
</tr>
<?php endwhile; ?>

</table>

<script>
function markAsRead(btn) {
    if (btn.classList.contains('marked')) {
        btn.classList.remove('marked');
        btn.textContent = 'Mark as Read';
    } else {
        btn.classList.add('marked');
        btn.textContent = 'Marked';
    }
}
</script>

</body>
</html>
