<?php
session_start();
include 'conn.php'; // Ensure this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        echo '<script>alert("Username and password are required."); window.location.href="login.php";</script>';
        exit();
    }

    // Query to check if the user exists
    try {
        $sql = "SELECT user_id, username, password, role FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $dbUsername, $dbPassword, $role);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $dbPassword)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $dbUsername;
                $_SESSION['role'] = $role;

                // Redirect based on role
                switch ($role) {
                    case 'admin':
                        echo '<script>alert("Login successful!"); window.location.href="admin_dashboard.php";</script>';
                        break;
                    case 'customer':
                        echo '<script>alert("Login successful!"); window.location.href="index.php";</script>';
                        break;
                    case 'staff':
                        echo '<script>alert("Login successful!"); window.location.href="staff_dashboard.php";</script>';
                        break;
                    default:
                        echo '<script>alert("Unknown role. Contact support."); window.location.href="login.php";</script>';
                }
            } else {
                echo '<script>alert("Invalid username or password."); window.location.href="login.php";</script>';
            }
        } else {
            echo '<script>alert("User does not exist."); window.location.href="login.php";</script>';
        }

        $stmt->close();
    } catch (Exception $e) {
        echo '<script>alert("An error occurred: ' . addslashes($e->getMessage()) . '"); window.location.href="login.php";</script>';
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management - Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffbb33;
        }
        .form-field {
            margin-bottom: 20px;
        }
        .form-field label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ffbb33;
        }
        .form-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
            outline: none;
            transition: border-color 0.3s ease;
        }
        .form-field input:focus {
            border-color: #ffbb33;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            color: white;
            border: none;
            transition: background 0.3s ease, transform 0.2s;
        }
        .login-button:hover {
            background: linear-gradient(135deg, #ff8800, #ffbb33);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST" action="">
        <div class="form-field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="login-button">Login</button>
    </form>
</div>

</body>
</html>
