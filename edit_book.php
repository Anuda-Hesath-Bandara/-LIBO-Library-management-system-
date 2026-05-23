<?php
// Include the database connection file
require 'conn.php';

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch the book details from the database using the book ID
    $sql = "SELECT * FROM books WHERE book_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $bookId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Fetch book details
            $book = $result->fetch_assoc();
        } else {
            $error_message = "Book not found.";
        }

        $stmt->close();
    }
} else {
    $error_message = "Book ID is missing.";
}

// Check if the form was submitted via POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $bookTitle = trim($_POST['bookTitle']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    
    // Handle image upload if a new image is provided
    if (isset($_FILES['bookImage']) && $_FILES['bookImage']['error'] == 0) {
        $imageTmpName = $_FILES['bookImage']['tmp_name'];
        $imageName = basename($_FILES['bookImage']['name']);
        $imageType = pathinfo($imageName, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate file type
        if (!in_array(strtolower($imageType), $allowedTypes)) {
            $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } else {
            // Set the target directory for the uploaded image
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $imagePath = $uploadDir . uniqid() . '.' . $imageType;

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($imageTmpName, $imagePath)) {
                $error_message = "Error uploading image.";
            }
        }
    } else {
        // If no new image, keep the old image
        $imagePath = $book['image']; // Retain the previous image
    }

    // Validate input (ensure no fields are empty)
    if (empty($bookTitle) || empty($category) || empty($price) || empty($description)) {
        $error_message = "All fields are required.";
    } else {
        // Prepare the SQL statement to update the book
        $sql = "UPDATE books SET title = ?, category = ?, price = ?, description = ?, image = ? WHERE book_id = ?";
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("ssdssi", $bookTitle, $category, $price, $description, $imagePath, $bookId);

            // Execute the statement
            if ($stmt->execute()) {
                $success_message = "Book updated successfully!";
                header("Location: book_management.php?message=" . urlencode($success_message)); // Redirect after success
                exit();
            } else {
                $error_message = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $error_message = "Failed to prepare the SQL statement.";
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #333;
    font-size: 2rem;
    margin-bottom: 20px;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

form div {
    margin-bottom: 15px;
    width: 100%;
}

label {
    font-size: 1rem;
    margin-bottom: 5px;
    display: block;
    color: #555;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1rem;
    background-color: #f9f9f9;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

input[type="file"] {
    padding: 5px;
    border: none;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

button:active {
    background-color: #388e3c;
}

/* Success and Error Messages */
.success-message {
    color: green;
    font-size: 1rem;
    margin-bottom: 15px;
}

.error-message {
    color: red;
    font-size: 1rem;
    margin-bottom: 15px;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #4CAF50;
}

    </style>
</head>
<body>

<div class="container">
    <h1>Edit Book</h1>

    <!-- Display error or success messages -->
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php elseif (isset($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- Edit Book Form -->
    <?php if (isset($book)): ?>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label for="bookTitle">Book Title:</label>
                <input type="text" id="bookTitle" name="bookTitle" value="<?php echo htmlspecialchars($book['title']); ?>" required>
            </div>
            <div>
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($book['category']); ?>" required>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($book['price']); ?>" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($book['description']); ?></textarea>
            </div>
            <div>
                <label for="bookImage">Upload New Image:</label>
                <input type="file" id="bookImage" name="bookImage" accept="image/*">
            </div>
            <button type="submit">Update Book</button>
        </form>
    <?php else: ?>
        <p>Book not found.</p>
    <?php endif; ?>
</div>

</body>
</html>
