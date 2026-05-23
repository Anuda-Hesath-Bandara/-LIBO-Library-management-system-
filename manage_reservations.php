<?php
include('conn.php');

// Fetch all reservations
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

if (isset($_GET['delete_id'])) {
    // Deleting the reservation
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM reservations WHERE id = ?";
    if ($stmt = $conn->prepare($delete_sql)) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            echo "Reservation deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <style>
        /* Add styles for the reservation table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btn {
            background-color: #ffbb33;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .action-btn:hover {
            background-color: #ff8800;
        }
    </style>
</head>
<body>

<h1>Manage Reservations</h1>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Reservation Date</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['reservation_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['comments']); ?></td>
                    <td>
                        <a href="edit_reservation.php?id=<?php echo $row['id']; ?>" class="action-btn">Edit</a>
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="action-btn" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No reservations found.</p>
<?php endif; ?>

</body>
</html>
<?php
$conn->close();
?>
