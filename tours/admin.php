<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #1d2671, #c33764);
        min-height: 100vh;
    }

    .header {
        background: rgba(0,0,0,0.8);
        color: #fff;
        padding: 20px;
        text-align: center;
        font-size: 28px;
        letter-spacing: 1px;
    }

    .container {
        max-width: 1100px;
        margin: 50px auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        padding: 0 20px;
    }

    .card {
        background: #fff;
        border-radius: 15px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        transition: 0.4s;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }

    .icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .card button,
    .card a.button {
        display: inline-block;
        text-decoration: none;
        background: #ff5722;
        color: #fff;
        padding: 12px 22px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: 0.3s ease;
    }

    .card button:hover,
    .card a.button:hover {
        background: #e64a19;
        transform: translateY(-3px);
    }

    .logout-btn {
        background: #ff3d3d !important;
    }

    .footer {
        text-align: center;
        color: #fff;
        margin-top: 40px;
        opacity: 0.8;
    }
</style>
</head>

<body>

<div class="header">Admin Dashboard</div>

<div class="container">

    <!-- Transport Bookings -->
    <div class="card">
        <div class="icon">📋</div>
        <h3>Transport Bookings</h3>
        <a class="button" href="admin_transport_bookings.php">Open</a>
    </div>

    <!-- Trip Reservations -->
    <div class="card">
        <div class="icon">🧳</div>
        <h3>Trip Reservations</h3>
        <!-- Update this link if the file name is different -->
        <a class="button" href="admin_bookings.php">Open</a>
        <!-- Example alternate -->
        <!-- <a class="button" href="admin-trips-bookings.php">Open</a> -->
    </div>

    <!-- Logout -->
    <div class="card">
        <div class="icon">🔓</div>
        <form action="logout.php" method="post">
            <button type="submit" class="button logout-btn">Logout</button>
        </form>
    </div>
    <div class="card enquiry-card">
    <div class="icon">❓</div> 
    <form action="admin_enquiries.php" method="post">
        <input type="hidden" name="message" value="I have a question...">
        <button type="submit" class="button enquiry-btn">Send Enquiry</button>
    </form>
</div>
</div>

<div class="footer">
    © 2025 Travel India Admin Panel
</div>

</body>
</html>
