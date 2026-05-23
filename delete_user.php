<?php
session_start();
include 'conn.php'; // Ensure this file contains your database connection

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Delete the user
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo '<script>alert("User deleted successfully!"); window.location.href="user_management.php";</script>';
    } else {
        echo '<script>alert("Error deleting user: ' . $stmt->error . '"); window.location.href="user_management.php";</script>';
    }
} else {
    echo '<script>alert("Invalid user ID."); window.location.href="user_management.php";</script>';
}
?>
