<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "travelindia");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get POST data safely
    $from_city      = $_POST['from_city'] ?? '';
    $to_city        = $_POST['to_city'] ?? '';
    $travel_date    = $_POST['travel_date'] ?? '';
    $passengers     = $_POST['passengers'] ?? '';
    $vehicle_class  = $_POST['vehicle_class'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $email          = $_POST['email'] ?? '';

    $stmt = $conn->prepare("INSERT INTO Tsbookings (from_city, to_city, travel_date, passengers, vehicle_class, contact_number, email) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error); // <-- This will show the real SQL error
    }

    $stmt->bind_param("sssisss", $from_city, $to_city, $travel_date, $passengers, $vehicle_class, $contact_number, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!');</script>";
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "');</script>";
    }

    $stmt->close();
}

$conn->close();

$type = 'Transport Booking';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transport Booking | Travel India</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
body{background:#f4f6f9;}
header{background:#222;color:#fff;padding:15px 0;}
.header-container{max-width:1200px;margin:auto;padding:0 20px;display:flex;justify-content:space-between;align-items:center;}
.logo{font-size:24px;font-weight:600;}
nav a{color:#fff;text-decoration:none;margin-left:20px;}
.booking-wrapper{max-width:900px;margin:50px auto;background:#fff;border-radius:12px;padding:30px;box-shadow:0 10px 30px rgba(0,0,0,0.15);}
.booking-title{text-align:center;font-size:30px;margin-bottom:10px;}
.transport-type{text-align:center;font-size:18px;color:#ff5722;margin-bottom:30px;}
.booking-form{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;}
.booking-form input,.booking-form select{padding:12px;border-radius:6px;border:1px solid #ccc;width:100%;}
.full{grid-column:1/-1;}
.book-btn{margin-top:30px;background:#ff5722;border:none;color:#fff;padding:14px;font-size:16px;border-radius:30px;cursor:pointer;width:100%;}
.info{margin-top:25px;background:#f7f7f7;padding:15px;border-radius:8px;font-size:14px;}
footer{margin-top:60px;background:#222;color:#fff;text-align:center;padding:15px;}
</style>
</head>
<body>

<header>
  <div class="header-container">
    <div class="logo">Travel<span style="color:#ff5722">India</span></div>
    <nav>
      <a href="index.html">Home</a>
    </nav>
  </div>
</header>

<div class="booking-wrapper">

  <h2 class="booking-title">Transport Booking</h2>
  <p class="transport-type" id="transportType">Loading...</p>

  <form class="booking-form" method="post" action="">
    <input type="text" name="from_city" placeholder="From City" required>
    <input type="text" name="to_city" placeholder="To City" required>

    <input type="date" name="travel_date" required>
    <input type="number" name="passengers" placeholder="Passengers" min="1" required>
    <select name="vehicle_class" required>
      <option value="">Select Class / Vehicle</option>
      <optgroup label="Bus">
      <option value="bus_economy">Economy</option>
      <option value="bus_ac">AC</option>
      </optgroup>
      <optgroup label="Car">
      <option value="car_sedan">Sedan</option>
      <option value="car_suv">SUV</option>
      </optgroup>
      <optgroup label="Train">
      <option value="train_sleeper">Sleeper</option>
      <option value="train_ac">AC</option>
      </optgroup>
      <optgroup label="Flight">
      <option value="flight_economy">Economy</option>
      <option value="flight_business">Business</option>
      <option value="flight_first">First Class</option>
      </optgroup>
    </select>

    <input type="text" name="contact_number" placeholder="Contact Number">
    <input type="email" name="email" placeholder="Email Address" class="full">

    <button type="submit" name="book" class="book-btn">Confirm Booking</button>
  </form>

  <div class="info">
    ✔ Secure booking <br>
    ✔ Best price guarantee <br>
    ✔ 24/7 customer support
  </div>

</div>

<footer>
  © 2025 Travel India. All Rights Reserved.
</footer>

<script>
  const type = "<?php echo addslashes($type); ?>";
  if(type){
    document.getElementById("transportType").innerText = "Booking for: " + type;
  } else {
    document.getElementById("transportType").innerText = "Select Transport";
  }
</script>

</body>
</html>
