<?php
session_start();
include 'conn.php'; // Ensure this file contains your database connection

// Fetch all users from the database
try {
    $sql = "SELECT user_id, username, email, role FROM users";
    $result = $conn->query($sql);
} catch (Exception $e) {
    die("Error fetching users: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management - User Management</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #ffbb33;
            color: #121212;
        }
        table tr:nth-child(even) {
            background-color: #2a2a2a;
        }
        table tr:hover {
            background-color: #444;
        }
        .actions button {
            padding: 5px 10px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: white;
        }
        .edit {
            background-color: #007bff;
        }
        .delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Management</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
    <td><?php echo htmlspecialchars($row['username']); ?></td>
    <td><?php echo htmlspecialchars($row['email']); ?></td>
    <td><?php echo htmlspecialchars($row['role']); ?></td>
    <td class="actions">
        <button class="edit" onclick="editUser(<?php echo $row['user_id']; ?>)">Edit</button>
        <button class="delete" onclick="deleteUser(<?php echo $row['user_id']; ?>)">Delete</button>
    </td>
</tr>

                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    function editUser(userId) {
        window.location.href = `edit_user.php?id=${userId}`;
    }

    function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = `delete_user.php?id=${userId}`;
        }
    }
</script>

</body>
</html>
