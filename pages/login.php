<?php
session_start();
require '../includes/db.php';
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect to homepage after successful login
        redirect('../index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --primary-color: #1a73e8;
            --secondary-color: #2c3e50;
            --accent-color: #ff6b6b;
            --success-color: #2ecc71;
            --error-color: #e74c3c;
            --text-color: #2c3e50;
            --background-overlay: rgba(255, 255, 255, 0.95);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('https://source.unsplash.com/1920x1080/?airplane,sky') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .flying-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .cloud {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: float 15s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateX(-100px) translateY(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateX(calc(100vw + 100px)) translateY(-50px);
                opacity: 0;
            }
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            background: var(--background-overlay);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
            transform: translateZ(0);
            margin: 20px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .logo {
            width: 140px;
            height: auto;
        }

        h1 {
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 2rem;
            font-size: 2.2rem;
            font-weight: 600;
            animation: fadeInUp 0.8s ease-out;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.1s;
        }

        .form-group:nth-child(3) {
            animation-delay: 0.2s;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .input-group {
            position: relative;
            transition: transform 0.3s ease;
        }

        .input-group:focus-within {
            transform: translateY(-2px);
        }

        .input-group i {
            position: absolute; 
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            transition: color 0.3s ease;
        }

        input {
            width: 100%;
            padding: 1rem 1rem 1rem 2.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.2);
        }

        input:focus + i {
            color: var(--primary-color);
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        button {
            width: 100%;
            padding: 1rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            background: #1557b0;
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(26, 115, 232, 0.2);
        }

        button:active {
            transform: translateY(0);
        }

        button.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        button.loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .links {
            text-align: center;
            margin-top: 1.8rem;
            animation: fadeInUp 0.8s ease-out;
            animation-delay: 0.3s;
            animation-fill-mode: both;
        }

        .links a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #1557b0;
        }

        .divider {
            margin: 1.8rem 0;
            text-align: center;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: rgba(0, 0, 0, 0.1);
        }

        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .divider span {
            background: var(--background-overlay);
            padding: 0 15px;
            color: #95a5a6;
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
                margin: 15px;
            }

            h1 {
                font-size: 1.8rem;
            }

            input {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="logo-container">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80">
                    <!-- Background circle -->
                    <circle cx="40" cy="40" r="32" fill="#4299e1" opacity="0.1"/>
                    
                    <!-- Stylized airplane -->
                    <path d="M20 40 L60 40 L80 30 L60 40 L80 50 L60 40 L20 40" 
                          fill="#4299e1" 
                          stroke="#2b6cb0" 
                          stroke-width="2"
                          stroke-linecap="round"/>
                    
                    <!-- Curved flight path -->
                    <path d="M15 45 Q40 20 65 45" 
                          fill="none" 
                          stroke="#4299e1" 
                          stroke-width="2" 
                          stroke-dasharray="2 2"/>
                    
                    <!-- Company name -->
                    <text x="95" y="35" 
                          font-family="Arial, sans-serif" 
                          font-size="18" 
                          font-weight="bold" 
                          fill="#2d3748">
                        SkyConnect
                    </text>
                    
                    <!-- Tagline -->
                    <text x="95" y="52" 
                          font-family="Arial, sans-serif" 
                          font-size="12" 
                          fill="#4a5568">
                        Booking Service
                    </text>
                </svg>
            </div>
        <h1>Welcome to SkyConnect</h1>
        <div id="errorContainer" class="error-message" style="display: none;"></div>
        
        <form method="POST" id="loginForm" novalidate>
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-group">
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        placeholder="Enter your email"
                    >
                    <i class="fas fa-envelope"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        placeholder="Enter your password"
                    >
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" id="submitButton">
                Sign In to Your Account
            </button>

            <div class="links">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>

            <div class="divider">
                <span>New to SkyConnect?</span>
            </div>

            <div class="links">
                <p>Create your account to start booking flights. <a href="register.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>
</html>