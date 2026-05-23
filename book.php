<?php
// Include the database connection file
require 'conn.php'; // Ensure this file connects to the database

// Fetch all books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        $bookTitle = $row['title'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $imagePath = $row['image'];

        echo '<div class="book-item">';
        echo '<h3>' . htmlspecialchars($bookTitle) . '</h3>';
        echo '<p><strong>Category:</strong> ' . htmlspecialchars($category) . '</p>';
        echo '<p><strong>Price:</strong> $' . number_format($price, 2) . '</p>';
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($description) . '</p>';
        
        // Display book image if available
        if ($imagePath) {
            echo '<img src="' . $imagePath . '" alt="Book Image" class="book-image" />';
        } else {
            echo '<p>No image available</p>';
        }
        echo '</div>';
    }
} else {
    echo '<p>No books found in the database.</p>';
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System - View Books</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            height: 100vh;
        }
        h2 {
            color: #333;
            font-size: 2rem;
            margin: 20px 0;
            text-align: center;
        }
        .book-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px 0;
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }
        .book-item h3 {
            margin: 0 0 10px;
            color: #333;
            font-size: 1.5rem;
        }
        .book-item p {
            color: #555;
            font-size: 1rem;
            margin: 5px 0;
        }
        .book-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }
        .book-list-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <h2>Books in the Library</h2>

    <div class="book-list-container">
        <!-- Dynamically generated book items will appear here -->
    </div>

</body>
</html>
