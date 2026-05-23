<?php
include('conn.php');

// Fetch the reservation details
if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    $sql = "SELECT * FROM reservations WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $reservation_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservation = $result->fetch_assoc();
        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update reservation details
        $bookTitle = $_POST['bookTitle'];
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $reservationDate = $_POST['reservationDate'];
        $comments = $_POST['comments'];

        $update_sql = "UPDATE reservations SET book_title = ?, user_name = ?, user_email = ?, reservation_date = ?, comments = ? WHERE id = ?";
        if ($stmt = $conn->prepare($update_sql)) {
            $stmt->bind_param("sssssi", $bookTitle, $userName, $userEmail, $reservationDate, $comments, $reservation_id);
            if ($stmt->execute()) {
                echo "Reservation updated successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <style>
         body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            opacity: 0.2;
            z-index: -1;
            transform: rotate(45deg);
        }
        h1, h2 {
            text-align: center;
            color: #ffbb33;
            margin-bottom: 20px;
        }
        .book-list, .reservation-form {
            margin: 20px 0;
        }
        .book-item {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #444;
            align-items: center;
        }
        .book-item:last-child {
            border-bottom: none;
        }
        .reserve-btn, .back-btn {
            background-color: #ffbb33;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .reserve-btn:hover, .back-btn:hover {
            background-color: #ff8800;
            transform: translateY(-2px);
        }
        .reserve-btn:active, .back-btn:active {
            background-color: #cc7700;
            transform: translateY(0);
        }
        .book-cover {
            width: 50px;
            height: 75px;
            margin-right: 10px;
            border-radius: 8px;
            object-fit: cover;
        }
        .book-details {
            flex-grow: 1;
            text-align: left;
        }
        .book-details span {
            display: block;
            font-size: 1.2rem;
            color: #ffbb33;
        }
        .book-details small {
            color: #888;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ff8800;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #ffbb33;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Reservation</h1>
        <form method="POST">
            <div class="form-group">
                <label for="bookTitle">Book Title:</label>
                <input type="text" id="bookTitle" name="bookTitle" value="<?php echo htmlspecialchars($reservation['book_title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="userName">User Name:</label>
                <input type="text" id="userName" name="userName" value="<?php echo htmlspecialchars($reservation['user_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="userEmail">User Email:</label>
                <input type="email" id="userEmail" name="userEmail" value="<?php echo htmlspecialchars($reservation['user_email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="reservationDate">Reservation Date:</label>
                <input type="date" id="reservationDate" name="reservationDate" value="<?php echo htmlspecialchars($reservation['reservation_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" rows="4" cols="50"><?php echo htmlspecialchars($reservation['comments']); ?></textarea>
            </div>
            <button type="submit">Update Reservation</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
