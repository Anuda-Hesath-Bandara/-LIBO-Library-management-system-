<?php
session_start();
include 'conn.php'; // Ensure this file contains your database connection

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Fetch user details
    $sql = "SELECT user_id, username, email, role FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found.");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);

        // Update user in the database
        $updateSql = "UPDATE users SET username = ?, email = ?, role = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("sssi", $username, $email, $role, $userId);

        if ($updateStmt->execute()) {
            echo '<script>alert("User updated successfully!"); window.location.href="user_management.php";</script>';
        } else {
            echo '<script>alert("Error updating user: ' . $updateStmt->error . '");</script>';
        }
    }
} else {
    die("Invalid user ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }
        .form-container h2 {
            text-align: center;
            color: #ffbb33;
        }
        .form-field {
            margin-bottom: 15px;
        }
        .form-field label {
            display: block;
            margin-bottom: 5px;
            color: #ffbb33;
        }
        .form-field input, .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #333;
            color: white;
            outline: none;
        }
        .form-field button {
            width: 100%;
            padding: 10px;
            border: none;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }
        .form-field button:hover {
            background: linear-gradient(135deg, #ff8800, #ffbb33);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit User</h2>
    <form method="POST">
        <div class="form-field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-field">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="customer" <?php echo $user['role'] === 'customer' ? 'selected' : ''; ?>>Customer</option>
                <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>
        <button type="submit">Update User</button>
    </form>
</div>

</body>
</html>
