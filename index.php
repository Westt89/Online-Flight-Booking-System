<?php
session_start();
require 'includes/auth.php';
require 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('pages/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <!--Created by Tivotal-->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <!--font awesome(for icons)-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <header class="header" id="home">
      <nav>
        <div class="navbar">
          <div class="logo">
            <a href="#">
              <img src="images/logo.png" alt="Logo" />
            </a>
          </div>

          <div class="menu_btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>

        <ul class="links">
          <li><a href="#home">Home</a></li>
          <li><a href="pages/booking.php">Book Now</a></li>
          <li><a href="pages/user/bookings.php">Bookings</a></li>
          <li><a href="#explore">Explore</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><?php if (isAdmin()): ?>
        <a href="pages/admin/dashboard.php">Admin Dashboard</a>
    <?php endif; ?></li>
        </ul>

        <button class="btn nav_btn" ><a href="logout.php">Logout</a></button>
      </nav>

      <section class="section header_section">
        <p>A glimpse of heaven</p>
        <h1>
          Step Into Serenity <br />
          Where <span>Luxury</span> Feels Like <span>Home</span>.
        </h1>
      </section>
    </header>

    

    <section class="section about_section" id="about">
      <div class="about_img">
        <img src="images/about-img.jpg" alt="" />
      </div>

      <div class="about_content">
        <p class="title">ABOUT US</p>
        <h2 class="tagline">A Whole New Level of Hospitality</h2>
        <p class="desc">
          With a focus on personalized experiences and
          seamless booking, our platform is dedicated to ensuring that every
          traveller embarks on their dream holiday with confidance and
          excitement.
        </p>
      </div>
    </section>



    <section class="popular" id="popular">
      <div class="section popular_section">
        <div class="popular_content">
          <p class="title">POPULAR DESTINATIONS</p>
          <h2 class="tagline">The best locations around the world for you.</h2>

          <ul class="popular_list">
            <li>
              <span><i class="fas fa-location"></i></span>
              Prague(Europe)
            </li>
            <li>
              <span><i class="fas fa-location"></i></span>
              Bangkok(Asia)
            </li>
            <li>
              <span><i class="fas fa-location"></i></span>
              Canada(America)
            </li>
            <li>
              <span><i class="fas fa-location"></i></span>
              Dubai(Middle East)
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="section banner_section">
      <div class="banner_content">
        <div class="banner_card">
          <h4>20M+</h4>
          <p>Hotels Available</p>
        </div>
        <div class="banner_card">
          <h4>30M+</h4>
          <p>Bookings Completed</p>
        </div>
        <div class="banner_card">
          <h4>40M+</h4>
          <p>Happy Customers</p>
        </div>
      </div>
    </section>

    <section class="section explore_section" id="explore">
      <p class="title">EXPLORE</p>
      <h2 class="tagline">Best places to stay for your next trip!</h2>

      <div class="explore_wrapper">
        <div class="explore_card">
          <div class="card_img">
            <img src="images/explore-1.jpg" alt="" />
            <div class="card_title">Maldives</div>
          </div>
        </div>
        <div class="explore_card">
          <div class="card_img">
            <img src="images/explore-2.jpg" alt="" />
            <div class="card_title">Cancun</div>
          </div>
        </div>
        <div class="explore_card">
          <div class="card_img">
            <img src="images/explore-3.jpg" alt="" />
            <div class="card_title">Fiji</div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer" id="contact">
      <div class="section footer_section">
        <div class="footer_col">
          <div class="logo">
            <a href="#home">
              <img src="images/logo.png" alt="Logo" width="5vh" />
            </a>
          </div>
          <p class="desc">
            A glimpse of heaven
          </p>
        </div>

        <div class="footer_col">
          <h4>Quicklinks</h4>
          <ul class="footer_links">
            <li><a href="#home">Home</a></li>
            <li><a href="pages/booking.php">Book Now</a></li>
            <li><a href="pages/user/bookings.php">Bookings</a></li>
            <li><a href="#explore">Explore</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li>
              <?php if (isAdmin()): ?>
                <a href="pages/admin/dashboard.php">Admin Dashboard</a>
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

    <script src="app.js"></script>
  </body>
</html>
