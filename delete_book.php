<?php
// Include the database connection file
require 'conn.php';

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Prepare SQL statement to delete the book
    $sql = "DELETE FROM books WHERE book_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $bookId);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to book management page with success message
            $success_message = "Book deleted successfully!";
            header("Location: book_management.php?message=" . urlencode($success_message));
            exit();
        } else {
            // Error in deletion
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "Failed to prepare the SQL statement.";
    }
} else {
    $error_message = "Book ID is missing.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
</head>
<body>

<div class="container">
    <h1>Delete Book</h1>

    <!-- Display error or success messages -->
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
