<?php
// learnmore.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn More - LifeDrop</title>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <h1>LifeDrop</h1>
    <div class="links">
      <a href="index.php">Home</a>
      <a href="register.php">Donor Register</a>
      <a href="search.php">Find Donor</a>
      <a href="about.php">About Us</a>
      <a href="records.php">Records</a>
    </div>
  </nav>

  <!-- Learn More Content -->
  <section class="learnmore">
    <h2>Learn More About Blood Donation</h2>

    <div class="lm-section">
      <h3>❤️ Why Donate Blood?</h3>
      <p>Every two seconds, someone in the world needs blood. A single donation can save up to three lives. Blood cannot be manufactured—it only comes from generous donors like you. By donating, you’re giving patients a second chance at life.</p>
    </div>

    <div class="lm-section">
      <h3>👥 Who Can Donate?</h3>
      <ul>
        <li><b>Age:</b> 18–65 years (may vary by country)</li>
        <li><b>Weight:</b> At least 50 kg (110 lbs)</li>
        <li><b>Health:</b> Feeling well, with no recent major illnesses or infections</li>
      </ul>
      <p>❌ You may not be able to donate if you’ve recently had surgery, are pregnant, or have certain medical conditions. Always check with our team for details.</p>
    </div>

    <div class="lm-section">
      <h3>🩸 The Donation Process</h3>
      <ol>
        <li><b>Register:</b> Fill out a quick form.</li>
        <li><b>Health Check:</b> We’ll check your blood pressure, hemoglobin, and general health.</li>
        <li><b>Donation:</b> The actual blood draw takes only 10–15 minutes.</li>
        <li><b>Refresh:</b> Relax with snacks and water before heading out.</li>
      </ol>
      <p>The whole process usually takes less than an hour.</p>
    </div>

    <div class="lm-section">
      <h3>🔄 Types of Blood Donation</h3>
      <ul>
        <li><b>Whole Blood:</b> The most common type, used in emergencies and surgeries.</li>
        <li><b>Plasma Donation:</b> Helps patients with burns, liver disease, and clotting disorders.</li>
        <li><b>Platelet Donation:</b> Vital for cancer patients and those undergoing transplants.</li>
        <li><b>Double Red Cell Donation:</b> Provides twice the red cells for trauma patients.</li>
      </ul>
    </div>

    <div class="lm-section">
      <h3>🌟 Benefits of Donating</h3>
      <ul>
        <li>Free mini health check-up each time you donate.</li>
        <li>Reduced risk of certain health issues.</li>
        <li>A sense of fulfillment knowing you’ve saved lives.</li>
      </ul>
    </div>

    <div class="lm-section">
      <h3>✅ Safety & Myths</h3>
      <p><b>Myth:</b> “Donating makes you weak.”<br>
      <b>Fact:</b> Most people feel fine after resting and having a snack.</p>
      <p><b>Myth:</b> “It’s unsafe.”<br>
      <b>Fact:</b> Every donation uses new, sterile equipment.</p>
    </div>

    <div class="lm-section">
      <h3>🍎 After Donation Care</h3>
      <ul>
        <li>Drink extra fluids for 24 hours.</li>
        <li>Eat iron-rich foods like leafy greens, beans, or meat.</li>
        <li>Avoid heavy exercise for the rest of the day.</li>
      </ul>
    </div>

    <div class="lm-section">
      <h3>❓ FAQs</h3>
      <p><b>How often can I donate?</b><br>
      Whole blood: Every 3 months (men), every 4 months (women).</p>
      <p><b>Is my blood tested?</b><br>
      Yes, all donations are screened for safety before being used.</p>
      <p><b>Does it hurt?</b><br>
      Just a quick pinch—most donors say it’s less painful than expected!</p>
    </div>

    <div class="lm-section">
      <h3>💬 Stories That Inspire</h3>
      <blockquote>
        "When my father needed blood during surgery, strangers stepped forward to help. That day, I promised to become a donor myself. Now I donate regularly to give back what others gave me." <br>— A grateful donor
      </blockquote>
    </div>

    <div class="lm-section">
      <h3>🙌 How You Can Help</h3>
      <ul>
        <li>Register today as a blood donor.</li>
        <li>Volunteer at a donation drive.</li>
        <li>Share this page to inspire others.</li>
      </ul>
      <p><b>Together, we can make sure no patient ever has to wait for the blood they need.</b></p>
      <a href="register.php" class="cta-button">Become a Donor</a>
    </div>
  </section>
  <style>
    /* Reset & Base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Arial, sans-serif;
}

body {
  background: #fafafa;
  color: #333;
  line-height: 1.6;
}

/* Navbar */
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #c62828;
  padding: 1rem 2rem;
  color: #fff;
  position: sticky;
  top: 0;
  z-index: 1000;
}

nav h1 {
  font-size: 1.8rem;
  font-weight: bold;
}

nav .links a {
  color: #fff;
  margin-left: 1.5rem;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease;
}

nav .links a:hover {
  color: #ffcccb;
}

/* Learn More Section */
.learnmore {
  max-width: 1000px;
  margin: 2rem auto;
  padding: 1rem 2rem;
}

.learnmore h2 {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 2rem;
  color: #c62828;
}

/* Sections */
.lm-section {
  background: #fff;
  padding: 1.5rem;
  margin-bottom: 1.8rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.lm-section h3 {
  margin: 1rem 0;
  font-size: 1.4rem;
  color: #b71c1c;
}

.lm-section ul,
.lm-section ol {
  margin-left: 1.5rem;
  margin-bottom: 1rem;
}

.lm-section p {
  margin-bottom: 1rem;
}

/* Images inside sections */
.section-img {
  width: 100%;
  max-height: 280px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 1rem;
  display: block;
  transition: transform 0.3s ease;
}

.section-img:hover {
  transform: scale(1.02);
}

/* Blockquote */
blockquote {
  border-left: 4px solid #c62828;
  padding-left: 1rem;
  font-style: italic;
  background: #fff5f5;
  border-radius: 6px;
}

/* CTA Button */
.cta-button {
  display: inline-block;
  background: #c62828;
  color: #fff;
  padding: 0.7rem 1.2rem;
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
  margin-top: 1rem;
  transition: background 0.3s ease;
}

.cta-button:hover {
  background: #b71c1c;
}

/* Footer */
footer {
  background: #c62828;
  color: #fff;
  text-align: center;
  padding: 1rem;
  margin-top: 3rem;
}
  </style>

  <!-- Footer -->
  <footer>
    <p>© 2025 LifeDrop | Built with ❤️ for a noble cause</p>
  </footer>

</body>
</html>
