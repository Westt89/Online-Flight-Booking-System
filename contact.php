<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SkyConnect</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f8fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header styles */
        header {
            background-color: #1a3a5f;
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        
        .logo span {
            color: #4fc3f7;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #4fc3f7;
        }
        
        /* Hero section */
        .hero {
            background: linear-gradient(rgba(26, 58, 95, 0.8), rgba(26, 58, 95, 0.8)), url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 20px;
        }
        
        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Contact section */
        .contact-section {
            padding: 60px 0;
        }
        
        .contact-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .contact-info {
            flex: 1;
            min-width: 300px;
        }
        
        .contact-info h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #1a3a5f;
        }
        
        .info-item {
            display: flex;
            margin-bottom: 25px;
        }
        
        .info-icon {
            width: 50px;
            height: 50px;
            background-color: #1a3a5f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 20px;
        }
        
        .info-content h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #1a3a5f;
        }
        
        .info-content p, .info-content a {
            color: #666;
            text-decoration: none;
        }
        
        .info-content a:hover {
            color: #4fc3f7;
        }
        
        .contact-form {
            flex: 1;
            min-width: 300px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .contact-form h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #1a3a5f;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            border-color: #1a3a5f;
            outline: none;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .btn {
            background-color: #1a3a5f;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #134a80;
        }
        
        /* Map section */
        .map-section {
            padding: 0 0 60px 0;
        }
        

        
        /* FAQ section */
        .faq-section {
            padding: 60px 0;
            background-color: #eef5fc;
        }
        
        .faq-section h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 40px;
            color: #1a3a5f;
        }
        
        .accordion {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .accordion-item {
            background-color: white;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .accordion-header {
            padding: 18px 20px;
            background-color: white;
            color: #1a3a5f;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }
        
        .accordion-header:hover {
            background-color: #f5f8fa;
        }
        
        .accordion-content {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
        
        .accordion-content.active {
            padding: 20px;
            max-height: 300px;
        }
        
        /* Footer styles */
        footer {
            background-color: #1a3a5f;
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        
        .footer-column {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #4fc3f7;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: white;
        }
        
        .footer-column p {
            color: #ccc;
            line-height: 1.8;
        }
        
        .social-links {
            display: flex;
            margin-top: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 10px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .social-links a:hover {
            background-color: #4fc3f7;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .footer-bottom p {
            color: #ccc;
            font-size: 14px;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 20px;
            }
            
            nav ul li {
                margin: 0 15px;
            }
            
            .hero h1 {
                font-size: 28px;
            }
            
            .hero p {
                font-size: 16px;
            }
            
            .contact-info, .contact-form {
                flex: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container header-content">
            <a href="index.php" class="logo">Sky<span>Connect</span></a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#flights">Flights</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Contact SkyConnect</h1>
            <p>We're here to help with your travel needs. Reach out to our friendly team for assistance with bookings, inquiries, or feedback.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container contact-container">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-content">
                        <h3>Call Us</h3>
                        <p>+233 260766531</p>
                        <p>Monday to Friday, 9am - 6pm</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div class="info-content">
                        <h3>Email Us</h3>
                        <a href="mailto:support@skyconnect.com">support@skyconnect.com</a>
                        <p>We'll respond within 24 hours</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div class="info-content">
                        <h3>Visit Us</h3>
                        <p>SkyConnect Headquarters</p>
                        <p>123 Aviation Way, Takoradi</p>
                        <p>Western Region, WR 00233</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">💬</div>
                    <div class="info-content">
                        <h3>Live Chat</h3>
                        <p>Chat with our support team</p>
                        <a href="#" id="open-chat">Start Chat</a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Full Name*</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address*</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject*</label>
                        <select id="subject" class="form-control" required>
                            <option value="">Select a subject</option>
                            <option value="booking">Booking Inquiry</option>
                            <option value="support">Customer Support</option>
                            <option value="feedback">Feedback</option>
                            <option value="partnership">Partnership</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message*</label>
                        <textarea id="message" class="form-control" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">
                        How can I change or cancel my flight booking?
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>You can change or cancel your flight booking by logging into your SkyConnect account and navigating to "My Bookings." Follow the prompts to modify or cancel your reservation. Please note that fees may apply depending on your fare type and the airline's policy.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        What is SkyConnect's refund policy?
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>Our refund policy varies based on the fare type and airline regulations. Refundable tickets can be fully refunded, while non-refundable tickets may qualify for partial refunds or future travel credits. Please check your booking details or contact our customer support for specific information about your reservation.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        How do I check in for my flight online?
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>Online check-in is available 24-48 hours before your scheduled departure. Simply log into your SkyConnect account, navigate to "My Bookings," select your flight, and follow the check-in process. You can download your boarding pass or have it sent to your email for easy access.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        How can I add special services to my booking?
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>To add special services such as meal preferences, wheelchair assistance, or extra baggage, log into your SkyConnect account and select "Manage Booking." Look for the "Special Services" option and make your selections. You can also contact our customer support team for assistance with special requests.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>SkyConnect</h3>
                    <p>Your trusted partner for hassle-free flight bookings. We connect you to destinations worldwide with the best deals and exceptional service.</p>
                    <div class="social-links">
                        <a href="#">f</a>
                        <a href="#">t</a>
                        <a href="#">in</a>
                        <a href="#">ig</a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#flights">Search Flights</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Booking Guide</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for exclusive travel deals and updates.</p>
                    <form>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email Address" class="form-control" style="margin-bottom: 10px;">
                            <button type="submit" class="btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 SkyConnect. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const isActive = content.classList.contains('active');
                    
                    // Close all accordion items
                    document.querySelectorAll('.accordion-content').forEach(item => {
                        item.classList.remove('active');
                    });
                    
                    document.querySelectorAll('.accordion-header .toggle').forEach(toggle => {
                        toggle.textContent = '+';
                    });
                    
                    // Open the clicked item if it wasn't active
                    if (!isActive) {
                        content.classList.add('active');
                        this.querySelector('.toggle').textContent = '-';
                    }
                });
            });
            
            // Form validation and submission
            const contactForm = document.getElementById('contactForm');
            
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Basic form validation
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const subject = document.getElementById('subject').value;
                    const message = document.getElementById('message').value;
                    
                    if (!name || !email || !subject || !message) {
                        alert('Please fill in all required fields.');
                        return;
                    }
                    
                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Please enter a valid email address.');
                        return;
                    }
                    
                    // Simulate form submission
                    alert('Thank you for your message! We will get back to you soon.');
                    contactForm.reset();
                });
            }
            
            // Live chat button functionality
            const openChatBtn = document.getElementById('open-chat');
            
            if (openChatBtn) {
                openChatBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert('Live chat feature would open here in the production version.');
                });
            }
        });
    </script>
</body>
</html>