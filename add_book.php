<?php
// Include the database connection file
require 'conn.php'; // Ensure this file connects to the database

// Check if the form was submitted via POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $bookTitle = trim($_POST['bookTitle']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);

    // Handle image upload
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
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                $imageUploadSuccess = true;
            } else {
                $error_message = "Error uploading image.";
            }
        }
    } else {
        // Set default value for image if not uploaded
        $imagePath = NULL;
    }

    // Validate input (ensure no fields are empty)
    if (empty($bookTitle) || empty($category) || empty($price) || empty($description)) {
        $error_message = "All fields are required.";
    } else {
        // Prepare the SQL statement to insert the new book
        $sql = "INSERT INTO books (title, category, price, description, image) VALUES (?, ?, ?, ?, ?)";

        // Use a prepared statement to prevent SQL injection
        if ($stmt = $conn->prepare($sql)) {
            // If no image uploaded, bind NULL to image field
            if ($imagePath === NULL) {
                // Bind parameters (without image)
                $stmt->bind_param("ssds", $bookTitle, $category, $price, $description);
            } else {
                // Bind parameters with image path
                $stmt->bind_param("ssdss", $bookTitle, $category, $price, $description, $imagePath);
            }

            // Execute the statement
            if ($stmt->execute()) {
                $success_message = "Book added successfully!";
            } else {
                $error_message = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            $error_message = "Failed to prepare the SQL statement.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System - Add New Book</title>
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
        .form-group input[type="file"] {
            font-size: 1rem;
        }
        .submit-btn {
            background-color: #ffbb33;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #ff8800;
            transform: translateY(-2px);
        }
        .submit-btn:active {
            background-color: #cc7700;
            transform: translateY(0);
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #ffbb33;
            outline: none;
        }
        .error-message, .success-message {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }
        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="book-form">
            <h2>Add New Book</h2>

            <!-- Display success or error messages -->
            <?php if (!empty($success_message)): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php elseif (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- Book Form -->
            <form id="bookForm" method="POST" action="add_book.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="bookTitle">Book Title:</label>
                    <input type="text" id="bookTitle" name="bookTitle" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div>
                <div class="form-group">
                    <label for="bookImage">Upload Image:</label>
                    <input type="file" id="bookImage" name="bookImage" accept="image/*">
                </div>
                <button type="submit" class="submit-btn">Add Book</button>
            </form>
        </div>
    </div>
</body>
</html>
