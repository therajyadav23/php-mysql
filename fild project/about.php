<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us - LifeSaver Blood Donation</title>
  <style>
    /* Reset & Base */
    * {
      margin: 0; padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      background: #f8f9fa;
      color: #333;
      line-height: 1.6;
    }

    /* Navbar */
    nav {
      background: linear-gradient(90deg, #b71c1c, #e53935);
      padding: 15px 30px;
      display: flex;
      justify-content: center;
      gap: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }
    nav a:hover {
      color: #ffcccb;
    }

    /* Header */
    header {
      background: url('images/banner.jpg') center/cover no-repeat, linear-gradient(rgba(198,40,40,0.8), rgba(183,28,28,0.8));
      color: white;
      text-align: center;
      padding: 80px 20px;
    }
    header h1 {
      font-size: 3rem;
      margin-bottom: 10px;
    }
    header p {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    /* Container */
    .container {
      width: 90%;
      max-width: 1200px;
      margin: 50px auto;
      display: flex;
      flex-direction: column;
      gap: 50px;
    }

    /* Section Cards */
    .section {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      align-items: center;
      background: white;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
      transition: transform 0.3s, box-shadow 0.3s;
      animation: fadeInUp 1s ease both;
    }
    .section:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }
    .section img {
      width: 100%;
      max-width: 500px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .section div {
      flex: 1;
      min-width: 280px;
    }

    /* Headings */
    h2 {
      color: #c62828;
      font-size: 1.8rem;
      margin-bottom: 15px;
      border-left: 5px solid #e53935;
      padding-left: 10px;
    }

    /* Footer */
    footer {
      background: linear-gradient(90deg, #b71c1c, #e53935);
      color: white;
      text-align: center;
      padding: 25px 10px;
      margin-top: 50px;
      font-size: 0.95rem;
    }

    /* Animations */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      header h1 {
        font-size: 2.2rem;
      }
      .section {
        flex-direction: column;
        text-align: center;
      }
      .section img {
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="register.php">Donor Register</a>
    <a href="search.php">Find Donor</a>
    <a href="records.php">Records</a>
  </nav>

  <!-- Hero Header -->
  <header>
    <h1>About Us</h1>
    <p>Together, we create a world where every drop counts.</p>
  </header>

  <!-- Main Content -->
  <div class="container">

    <!-- Introduction -->
    <div class="section">
      <div>
        <h2>Who We Are</h2>
        <p>
          We are LifeSavers, a community-driven organization committed to the belief that every drop of blood has the power to save a life.
          Founded on compassion, purpose, and a mission to serve humanity, our organization brings together donors, volunteers, healthcare professionals, and partners with one goal — to ensure a safe, reliable blood supply for those in need.
          <br><br>
          Whether it’s organizing mobile donation drives, educating communities about the importance of regular donation, or supporting hospitals with timely blood delivery — we act with urgency, empathy, and integrity.
        </p>
      </div>
      <div>
        <img src="images/images1.jpg" alt="About Us">
      </div>
    </div>

    <!-- Mission -->
    <div class="section">
      <div>
        <img src="images/mission.jpg" alt="Mission">
      </div>
      <div>
        <h2>Our Mission</h2>
        <p>
          Our mission is to save lives by encouraging voluntary, safe, and regular blood donation through accessible, community-based camps that foster awareness, compassion, and a sense of social responsibility.
          <br><br>
          We aim to:
          <br>• Ensure a safe and sufficient blood supply for hospitals and patients in critical need.
          <br>• Educate and engage the public on the importance of regular blood donation.
          <br>• Build a culture of giving by connecting compassionate donors with life-saving causes.
          <br>• Promote voluntary and non-remunerated donations that uphold the highest standards of ethics and safety.
        </p>
      </div>
    </div>

    <!-- Vision -->
    <div class="section">
      <div>
        <h2>Our Vision</h2>
        <p>
          A world where every individual in need of blood receives it on time, through a community built on compassion, responsibility, and voluntary donation.
          <br><br>
          We envision:
          <br>• A future where no life is lost due to a shortage of blood.
          <br>• A society where voluntary blood donation is a regular act of kindness.
          <br>• A healthcare system with safe, sufficient, and accessible blood for all patients.
          <br>• A global network of informed and empowered donors who understand their vital role in saving lives.
        </p>
      </div>
      <div>
        <img src="images/vision.jpg" alt="Vision">
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 LifeSaver Blood Donation. All rights reserved.</p>
  </footer>

</body>
</html>
