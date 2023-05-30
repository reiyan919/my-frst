<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');

// Check if the "id" parameter is set
if (isset($_GET["bookid"])) {
    // Sanitize the ID parameter
    $bookid = mysqli_real_escape_string($conn, $_GET["bookid"]);

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM book WHERE bookid = ?");
    $stmt->bind_param("i", $bookid);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Redirect after successful deletion
        header("Location: /cultur/atelierspace.php");
        exit;
    } else {
        // Display an error message if deletion fails
        $errorMessage = "Failed to delete the book.";
    }
} else {
    // Display an error message if the "id" parameter is missing
    $errorMessage = "Book ID is missing.";
}
?>



