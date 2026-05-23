<?php
include('conn.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $bookTitle = $_POST['bookTitle'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $reservationDate = $_POST['reservationDate'];
    $comments = $_POST['comments'];

    // Prepare SQL statement
    $sql = "INSERT INTO reservations (book_title, user_name, user_email, reservation_date, comments)
            VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $bookTitle, $userName, $userEmail, $reservationDate, $comments);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Reservation submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reservation System</title>
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
        <h1>Book Reservation System</h1>
        <div class="book-list">
            <h2>Available Books</h2>
            <div class="book-item">
                <img src="fiction.jpg" alt="Fiction Book 1" class="book-cover">
                <div class="book-details">
                    <span>Fiction Book 1</span>
                    <small>Fiction</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Fiction Book 1')">Reserve</button>
            </div>
            <div class="book-item">
                <img src="non fictional.jpg" alt="Non-Fiction Book 1" class="book-cover">
                <div class="book-details">
                    <span>Non-Fiction Book 1</span>
                    <small>Non-Fiction</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Non-Fiction Book 1')">Reserve</button>
            </div>
            <div class="book-item">
                <img src="childrens.jpg" alt="Children's Book 1" class="book-cover">
                <div class="book-details">
                    <span>Children's Book 1</span>
                    <small>Children's Books</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Children\'s Book 1')">Reserve</button>
            </div>
            <div class="book-item">
                <img src="educational.jpg" alt="Educational Book 1" class="book-cover">
                <div class="book-details">
                    <span>Educational Book 1</span>
                    <small>Educational</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Educational Book 1')">Reserve</button>
            </div>
            <div class="book-item">
                <img src="comic.jpg" alt="Comic Book 1" class="book-cover">
                <div class="book-details">
                    <span>Comic Book 1</span>
                    <small>Comic Books</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Children\'s Book 1')">Reserve</button>
            </div>
            <div class="book-item">
                <img src="religious.jpg" alt="Religious Book 1" class="book-cover">
                <div class="book-details">
                    <span>Religious Book 1</span>
                    <small>Religious Books</small>
                </div>
                <button class="reserve-btn" onclick="reserveBook('Children\'s Book 1')">Reserve</button>
            </div>
        </div>
        <div class="reservation-form" style="display:none;">
            <h2>Reservation Form</h2>
            <form id="reservationForm">
                <div class="form-group">
                    <p>Reserving: <span id="bookTitle"></span></p>
                </div>
                <div class="form-group">
                    <label for="userName">Name:</label>
                    <input type="text" id="userName" name="userName" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="userEmail" required>
                </div>
                <div class="form-group">
                    <label for="reservationDate">Reservation Date:</label>
                    <input type="date" id="reservationDate" name="reservationDate" required>
                </div>
                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
                </div>
                <button type="submit" class="reserve-btn">Submit Reservation</button>
                <button type="button" class="back-btn" onclick="goBack()">Back</button>
            </form>
        </div>
    </div>
    <script>
        function reserveBook(title) {
            document.querySelector('.book-list').style.display = 'none';
            document.querySelector('.reservation-form').style.display = 'block';
            document.getElementById('bookTitle').innerText = title;
        }

        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Reservation submitted for ' + document.getElementById('bookTitle').innerText);
            document.querySelector('.book-list').style.display = 'block';
            document.querySelector('.reservation-form').style.display = 'none';
        });

        function goBack() {
            document.querySelector('.book-list').style.display = 'block';
            document.querySelector('.reservation-form').style.display = 'none';
        }
    </script>
</body>
</html>

