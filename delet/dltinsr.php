<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');

// Check if the "id" parameter is set
if (isset($_GET["id"])) {
    // Sanitize the ID parameter
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM abonn WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Redirect after successful deletion
        header("location: /cultur/atelierspace.php"); 
    } else {
        // Display an error message if deletion fails
        $errorMessage = "Failed to delete the book.";
    }
} else {
    // Display an error message if the "id" parameter is missing
    $errorMessage = "Book ID is missing.";
}
?>








