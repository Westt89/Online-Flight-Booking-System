<?php
session_start();
require '../includes/auth.php';
require '../includes/functions.php';

if (!isLoggedIn()) {
    redirect('pages/login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, booking_date, booking_time, status) VALUES (?, ?, ?, 'pending')");
    $stmt->execute([$user_id, $booking_date, $booking_time]);

    echo '<script type="text/javascript">
        window.onload = function () {
            alert("Booking Successful.");
            window.location.href = "user/bookings.php";
        };
      </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header class="header" id="home">
      <nav>
        <div class="navbar">
          <div class="logo">
            <a href="#">
              <img src="images/logo.png" alt="" />
            </a>
          </div>

          <div class="menu_btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <ul class="links">
          <li><a href="../index.php">Home</a></li>
          <li><a href="#">Book Now</a></li>
          <li><a href="user/bookings.php">Bookings</a></li>
          <li><a href="../index.php#explore">Explore</a></li>
          <li><a href="../index.php#contact">Contact</a></li>
          <li>
            <?php if (isAdmin()): ?>
              <a href="../admin/dashboard.php">Admin Dashboard</a>
            <?php endif; ?>
          </li>
        </ul>

        <button class="btn nav_btn">Logout</button>
      </nav>

      <section class="section header_section">
        <p>Stay - Relax - Repeat</p>
        <h1>
          <span>Book Now</span>.
        </h1>
      </section>
    </header>
    <section class="section booking_section">
      <form method="post" class="booking_form">
        <div class="input_box">
          <span><i class="fas fa-calendar"></i></span>
          <div>
            <label for="booking_date">Date:</label>
            <input type="date" name="booking_date" required>
          </div>
        </div>
        <div class="input_box">
          <span><i class="fas fa-calendar"></i></span>
          <div>
            <label for="booking_time">Time:</label>
            <input type="time" name="booking_time" required>
          </div>
        </div>
        <div class="input_box">
        <button type="submit" class="btn">Book</button>
        </div>
      </form>
    </section>
    <footer class="footer" id="contact">
      <div class="section footer_section">
        <div class="footer_col">
          <div class="logo">
            <a href="#home">
              <img src="images/logo.png" alt="" />
            </a>
          </div>
          <p class="desc">
            A glimpse of heaven
          </p>
        </div>

        <div class="footer_col">
          <h4>Quicklinks</h4>
          <ul class="footer_links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Book Now</a></li>
            <li><a href="user/bookings.php">Bookings</a></li>
            <li><a href="../index.php#explore">Explore</a></li>
            <li><a href="../index.php#contact">Contact</a></li>
            <li>
              <?php if (isAdmin()): ?>
                <a href="../admin/dashboard.php">Admin Dashboard</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>

        <div class="footer_col">
          <h4>CONTACT US</h4>
          <ul class="footer_links">
            <li><a href="#">skyconnect@info.com</a></li>
          </ul>
          <div class="socials">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="copyright">
        Copyright &#169; 2025 SkyConnect. All rights reserved
      </div>
    </footer>
</body>
</html>