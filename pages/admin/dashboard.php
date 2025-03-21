<?php
session_start();
require '../../includes/db.php';
require '../../includes/functions.php';

// Ensure only admins can access this page
if (!isAdmin()) {
    redirect('../login.php');
}

// Fetch all bookings with user details
$stmt = $pdo->query("
    SELECT b.id, b.booking_date, b.booking_time, b.status, u.name AS user_name, u.email
    FROM bookings b
    JOIN users u ON b.user_id = u.id
");
$bookings = $stmt->fetchAll();

// Process booking status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->execute([$status, $booking_id]);

    // Redirect to refresh the page
    redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Container Styling */
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Heading */
        .container h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }

        /* Table Headers */
        th {
            background: #007bff;
            color: #ffffff;
            font-size: 16px;
        }

        /* Alternate Row Colors for Better Readability */
        tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        /* Hover effect on rows */
        tbody tr:hover {
            background: #e0e0e0;
        }

        /* Dropdown Styling */
        select {
            padding: 6px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background: #fff;
            cursor: pointer;
        }

        /* Button Styling */
        button {
            padding: 6px 12px;
            border: none;
            background: #28a745;
            color: #fff;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #218838;
        }

        /* Back to Home Link */
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        a:hover {
            background: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 8px;
            }
            select, button {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['id']) ?></td>
                        <td><?= htmlspecialchars($booking['user_name']) ?></td>
                        <td><?= htmlspecialchars($booking['email']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_time']) ?></td>
                        <td><?= htmlspecialchars($booking['status']) ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">
                                <select name="status">
                                    <option value="pending" <?= $booking['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="confirmed" <?= $booking['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                    <option value="canceled" <?= $booking['status'] === 'canceled' ? 'selected' : '' ?>>Canceled</option>
                                </select>
                                <button type="submit" name="update_status">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="../../index.php">Back to Home</a>
    </div>
</body>
</html>
