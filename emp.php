<?php
include('inc/conx.php');

$name = "";
$category = "";
$email = "";
$password = "";

$errorMessage = "";
$successMessage = "";

if(isset($_POST['submit'])){ 
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $category = isset($_POST["category"]) ? filter_var($_POST["category"], FILTER_SANITIZE_STRING) : "";
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

  if (empty($name) || empty($category) || empty($email) || empty($password)) {
    $errorMessage = "All the fields are required";
  } else {
    // Check if email and password exist in abonn table
    $check_query = "SELECT * FROM `abonn` WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $check_result = $stmt->get_result();
    if ($check_result->num_rows > 0) {
      // Email and password exist in abonn table, add new client to empurnt table
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $insert_query = "INSERT INTO `empurnt` (id, name, category, email, password) VALUES (NULL, ?, ?, ?, ?)";
      $stmt = $conn->prepare($insert_query);
      $stmt->bind_param("ssss", $name, $category, $email, $hashed_password);
      $insert_result = $stmt->execute();
      if ($insert_result) {
        $name = "";
        $category = "";
        $email = "";
        $password = "";
        $successMessage = "Client added successfully";
      } else {
        $errorMessage = "Invalid query" . $conn->error;
      }
    } else {
      // Email and/or password do not exist in abonn table
      $errorMessage = "Invalid email and/or password";
    }
  }
}
?>
