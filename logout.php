<?php
// Start the session (if not already started)
session_start();

// Check if the user has confirmed the logout
if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    // Perform any necessary logout operations here
    // For example, you can unset session variables or destroy the session
header('Location: bibliothq.php');
exit();
}
?>
