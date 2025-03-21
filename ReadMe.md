To use this you'd have to do the following
1. Extract the files and place it in the root folder of your apache server
2. Create a database and name it "booking_system"
3. Import the sql file from the zip folder into phpmyadmin(into the database created above)
4. Currently only the admin profile is set so you'd need to create an account to use it
--- ADMIN DETAILS
email="admin@example.com"
password="password"
# SkyConnect Online Booking System
## System Documentation

**Version:** 1.0  
**Date:** March 3, 2025  
**Author:** Group 6 Mmembers

---

## Table of Contents

1. [Introduction](#introduction)
2. [System Overview](#system-overview)
3. [Technical Architecture](#technical-architecture)
4. [Database Structure](#database-structure)
5. [User Interfaces](#user-interfaces)
6. [Admin Dashboard](#admin-dashboard)
7. [Core Functionality](#core-functionality)
8. [Security Measures](#security-measures)
9. [Installation Guide](#installation-guide)
10. [Troubleshooting](#troubleshooting)
11. [Future Enhancements](#future-enhancements)

---

## 1. Introduction

SkyConnect is a web-based booking management system designed to streamline the process of managing bookings and appointments. The system provides an intuitive interface for users to create bookings and for administrators to manage these bookings efficiently.



### Purpose

The SkyConnect booking system aims to:
- Provide users with a simple way to book appointments
- Give administrators tools to manage bookings effectively
- Maintain a clear overview of all scheduled appointments
- Provide real-time status updates of bookings

### Scope

This documentation covers the entire SkyConnect booking system, including the user-facing booking interface and the admin dashboard for booking management.

---

## 2. System Overview

SkyConnect is built using PHP with a MySQL database backend. The system consists of two main components:

1. **User Portal** - Where users can register, log in, and create bookings
2. **Admin Dashboard** - Where administrators can view and manage all bookings

### Key Features

- User registration and authentication
- Booking creation with date and time selection
- Admin dashboard for booking management
- Booking status tracking (pending, confirmed, canceled)
- Email notifications for booking status changes
- Responsive design for mobile and desktop devices

---

## 3. Technical Architecture

SkyConnect is built on a standard LAMP stack (Linux, Apache, MySQL, PHP) architecture.

### Technology Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Server:** Apache 2.4+

### System Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server with mod_rewrite enabled
- Minimum 1GB RAM server
- 5GB disk space

### Directory Structure

```
/
├── admin/
│   ├── dashboard.php
│   └── login.php
├── includes/
│   ├── db.php
│   └── functions.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── index.php
├── login.php
├── register.php
├── booking.php
└── logout.php
```

---

## 4. Database Structure

The SkyConnect system uses a relational database with the following key tables:

### Table: users

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key, auto-increment |
| name | VARCHAR(100) | User's full name |
| email | VARCHAR(100) | User's email address (unique) |
| password | VARCHAR(255) | Hashed password |
| created_at | TIMESTAMP | Account creation timestamp |
| is_admin | TINYINT(1) | Admin flag (0=user, 1=admin) |

### Table: bookings

| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary key, auto-increment |
| user_id | INT | Foreign key to users table |
| booking_date | DATE | Selected booking date |
| booking_time | TIME | Selected booking time |
| status | VARCHAR(20) | Booking status (pending, confirmed, canceled) |
| created_at | TIMESTAMP | Booking creation timestamp |
| updated_at | TIMESTAMP | Last update timestamp |

### Database Relationships

- One user can have multiple bookings (One-to-Many relationship)

---

## 5. User Interfaces

### User Registration

The registration page allows new users to create accounts with the following fields:
- Full Name
- Email Address
- Password
- Password Confirmation

### User Login

The login page includes:
- Email Address field
- Password field
- "Remember Me" checkbox
- "Forgot Password" link

### Booking Creation

The booking creation page includes:
- Date selector (calendar interface)
- Time slot selector
- Optional notes or special requests field
- Submission button

### User Dashboard

The user dashboard displays:
- List of user's active bookings
- Booking history
- Ability to cancel or modify pending bookings

---

## 6. Admin Dashboard

The admin dashboard is a comprehensive tool for managing all bookings within the system.

### Key Features

- Complete overview of all bookings
- Filtering by date, status, and user
- Ability to update booking status
- User management capabilities
- System statistics and reporting

### Interface Elements

- Navigation header with system name and logout options
- Tabular display of bookings with all relevant details
- Status update functionality with dropdown selection
- Color-coded status indicators
- Responsive design for various screen sizes

---

## 7. Core Functionality

### User Authentication

The system implements secure user authentication with:
- Password hashing using PHP's password_hash() function
- Session-based authentication
- Role-based access control
- CSRF protection on all forms

### Booking Management

The booking process follows these steps:
1. User selects date and time for booking
2. System validates availability of selected slot
3. Booking is created with "pending" status
4. Admin reviews and updates status to "confirmed" or "canceled"
5. User receives notification of status change

### Admin Operations

Administrators can perform the following actions:
- View all bookings in the system
- Filter and search bookings by various criteria
- Update booking status
- Manage user accounts
- Generate reports and statistics

---

## 8. Security Measures

SkyConnect implements various security measures to protect user data and prevent unauthorized access.

### Implemented Security Features

- Password hashing using bcrypt
- Prepared statements for database queries to prevent SQL injection
- Input validation and sanitization
- CSRF token protection
- Session security with secure and HTTP-only cookies
- Role-based access control
- XSS prevention through output escaping

### Data Protection

- User passwords are never stored in plaintext
- Sensitive operations require re-authentication
- Regular security updates and patches

---

## 9. Installation Guide

### Prerequisites

Ensure your server meets the following requirements:
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache with mod_rewrite enabled

### Installation Steps

1. **Database Setup**
   ```sql
   CREATE DATABASE skyconnect;
   USE skyconnect;
   
   CREATE TABLE users (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     email VARCHAR(100) UNIQUE NOT NULL,
     password VARCHAR(255) NOT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     is_admin TINYINT(1) DEFAULT 0
   );
   
   CREATE TABLE bookings (
     id INT AUTO_INCREMENT PRIMARY KEY,
     user_id INT NOT NULL,
     booking_date DATE NOT NULL,
     booking_time TIME NOT NULL,
     status VARCHAR(20) DEFAULT 'pending',
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     FOREIGN KEY (user_id) REFERENCES users(id)
   );
   ```

2. **File Configuration**
   - Upload all files to your web server
   - Configure database connection in `/includes/db.php`
   - Set appropriate file permissions

3. **Creating Admin User**
   - Register a regular user through the interface
   - Use the following SQL query to promote to admin:
   ```sql
   UPDATE users SET is_admin = 1 WHERE email = 'admin@example.com';
   ```

4. **Testing the Installation**
   - Navigate to the site URL
   - Test user registration and login
   - Test booking creation
   - Test admin dashboard access

---

## 10. Troubleshooting

### Common Issues and Solutions

| Issue | Possible Cause | Solution |
|-------|---------------|----------|
| Database connection error | Incorrect credentials or database server down | Verify database credentials in db.php and check database server status |
| Blank page after login | PHP error with display_errors disabled | Check PHP error logs and enable display_errors temporarily |
| Cannot create booking | Time slot already taken or validation error | Check for validation errors in the form and verify slot availability |
| Admin dashboard not accessible | User not set as admin or session issues | Verify user has admin privileges in the database |

### Logging

The system logs errors in the following locations:
- PHP errors: Server's PHP error log
- Application errors: `/logs/app_error.log`
- Access logs: Apache access logs

---

## 11. Future Enhancements

The following features are planned for future releases:

### Short-term Plans
- Email notifications for status changes
- SMS reminders for upcoming bookings
- Enhanced reporting capabilities
- User profile management

### Long-term Vision
- API development for third-party integration
- Mobile application development
- Payment processing integration
- Multi-location support
- Advanced analytics dashboard

---

© 2025 SkyConnect Booking System | All Rights Reserved
