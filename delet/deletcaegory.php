<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');

// Check if the "id" parameter is set
if (isset($_GET["categoryid"])) {
    // Sanitize the ID parameter
    $categoryid = mysqli_real_escape_string($conn, $_GET["categoryid"]);

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM category WHERE categoryid = ?");
    $stmt->bind_param("i", $categoryid);

    // Execute the delete statement
    if ($stmt->execute()) {
        // Redirect after successful deletion
        header("location: /cultur/category.php"); 
    } else {
        // Display an error message if deletion fails
        $errorMessage = "Failed to delete the book.";
    }
} else {
    // Display an error message if the "id" parameter is missing
    $errorMessage = "Book ID is missing.";
}
?>





