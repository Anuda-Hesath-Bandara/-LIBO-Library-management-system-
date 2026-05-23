<?php
// Include the database connection file
require 'conn.php';

// Fetch all books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch all books into an array
    $books = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $books = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System - Book Management</title>
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
            flex-direction: column;
            height: 100vh;
        }
        .container {
            max-width: 1000px;
            width: 100%;
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
        h1 {
            color: #ffbb33;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #ff8800;
            color: white;
        }
        table td {
            background-color: #333;
        }
        .action-btn {
            background-color: #ffbb33;
            color: #333;
            padding: 5px 10px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .action-btn:hover {
            background-color: #ff8800;
            transform: translateY(-2px);
        }
        .action-btn:active {
            background-color: #cc7700;
            transform: translateY(0);
        }
        .success-message {
            color: green;
            font-weight: bold;
            margin: 10px 0;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Book Management</h1>

        <!-- Display success or error messages -->
        <?php if (isset($_GET['message']) && !empty($_GET['message'])): ?>
            <div class="success-message"><?php echo htmlspecialchars($_GET['message']); ?></div>
        <?php elseif (isset($_GET['error']) && !empty($_GET['error'])): ?>
            <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <!-- Display Books in a Table -->
        <?php if (count($books) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['category']); ?></td>
                            <td><?php echo htmlspecialchars($book['price']); ?></td>
                            <td><?php echo htmlspecialchars($book['description']); ?></td>
                            <td>
                                <?php if ($book['image']): ?>
                                    <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="Book Image" width="100" />
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td>
                            <a href="edit_book.php?id=<?php echo $book['book_id']; ?>" class="action-btn">Edit</a>
<a href="delete_book.php?id=<?php echo $book['book_id']; ?>" class="action-btn" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books found in the system.</p>
        <?php endif; ?>

        <a href="add_book.php" class="action-btn">Add New Book</a>
    </div>

</body>
</html>
