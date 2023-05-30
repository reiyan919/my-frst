<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cultuermb";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$birthday = "";
$photo = "";
$phone = "";
$outile = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client

    if (!isset($_GET["id"])) {
        header("location:/cultur/artist.php");
        exit;
    }

    $id = $_GET["id"];

    // Read the row of the selected client from the database table
    $sql = "SELECT * FROM `artiset` WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:/cultur/admin.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $birthday = $row["birthday"];
    $photo = $row["photo"];
    $phone = $row["phone"];
    $outile = $row["outile"];
} else {
    // POST method: Update the data of the client

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $photo = $_POST["photo"];
    $phone = $_POST["phone"];
    $outile = $_POST["outile"];

    $sql = "UPDATE `artiset` SET name = '$name', email = '$email', birthday = '$birthday', photo = '$photo', phone = '$phone', outile = '$outile' WHERE id = $id";
    $result = $connection->query($sql);

    if (!$result) {
        $errorMessage = "Invalid query: " . $connection->error;
    } else {
        $successMessage = "Client updated successfully";
        header("location:/cultur/artist.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Edit Client</h2>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-warning" role="alert">
                <strong><?php echo $errorMessage; ?></strong>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <strong><?php echo $successMessage; ?></strong>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Birthday</label>
                <input type="text" class="form-control" name="birthday" value="<?php echo $birthday; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Outile</label>
                <input type="text" class="form-control" name="outile" value="<?php echo $outile; ?>">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-outline-primary" href="/cultur/admin.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
