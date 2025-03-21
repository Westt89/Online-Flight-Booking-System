<?php
session_start();
require '../../includes/db.php';
require '../../includes/functions.php';

// Ensure only logged-in users can access this page
if (!isLoggedIn()) {
    redirect('../login.php');
}

$user_id = $_SESSION['user_id'];

// Fetch bookings for the logged-in user
$stmt = $pdo->prepare("
    SELECT booking_date, booking_time, status
    FROM bookings
    WHERE user_id = ?
");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        .section.booking_section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .section.booking_section h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .section.booking_section table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .section.booking_section th, 
        .section.booking_section td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .section.booking_section th {
            background: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .section.booking_section tr:nth-child(even) {
            background: #f2f2f2;
        }

        .section.booking_section a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .section.booking_section a:hover {
            background: #0056b3;
        }

    </style>
</head>
<body>
<header class="header" id="home">
      <nav>
        <div class="navbar">
          <div class="logo">
            <a href="#">
              <img src="../../images/logo.png" alt="" />
            </a>
          </div>

          <div class="menu_btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <ul class="links">
          <li><a href="../../index.php">Home</a></li>
          <li><a href="../booking.php">Book Now</a></li>
          <li><a href="#">Bookings</a></li>
          <li><a href="../../index.php#explore">Explore</a></li>
          <li><a href="#contact">Contact</a></li>
          <li>
            <?php if (isAdmin()): ?>
                <a href="../admin/dashboard.php">Admin Dashboard</a>
            <?php endif; ?>
          </li>
        </ul>

        <button class="btn nav_btn">Logout</button>
      </nav>
    </header>
    <section class="section booking_section">
        <h1>My Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_time']) ?></td>
                        <td><?= htmlspecialchars($booking['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="../../index.php">Back to Home</a>
    </section>
    <footer class="footer" id="contact">
      <div class="section footer_section">
        <div class="footer_col">
          <div class="logo">
            <a href="#home">
              <img src="../../images/logo.png" alt="" />
            </a>
          </div>
          <p class="desc">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto
            nam dolore, alias quia atque nostrum!
          </p>
        </div>

        <div class="footer_col">
          <h4>Quicklinks</h4>
          <ul class="footer_links">
            <li><a href="../index.php#home">Home</a></li>
            <li><a href="../index.php#about">About</a></li>
            <li><a href="../index.php#popular">Popular</a></li>
            <li><a href="../index.php#explore">Explore</a></li>
            <li><a href="#contact">Contact</a></li>
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