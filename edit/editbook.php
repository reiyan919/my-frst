<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cultuermb";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$bookid = "";
$name = "";
$picture = "";
$isbn = "";
$category = "";
$no_of_copy = "";
$status = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the book
    if (!isset($_GET["bookid"])) {
        header("location: /cultur/atelierspace.php");
        exit;
    }

    $bookid = $_GET["bookid"];

    // Read the row of the selected book from the database table
    $sql = "SELECT * FROM `book` WHERE bookid = '$bookid'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: /cultur/atelierspace.php");
        exit;
    }

    $name = $row["name"];
    $picture = $row["picture"];
    $isbn = $row["isbn"];
    $category = $row["categoryid"];
    $no_of_copy = $row['no_of_copy'];
    $status = $row['auteur'];

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // POST method: Update the data of the book
    $bookid = $_POST["bookid"];
    $name = $_POST["name"];
    $isbn = $_POST["isbn"];
    $category = $_POST["category"];
    $no_of_copy = $_POST['no_of_copy'];
    $status = $_POST['status'];

    $sql = "UPDATE `book` SET name=?, isbn=?, categoryid=?, no_of_copy=?, auteur=? WHERE bookid=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("sssiis", $name, $isbn, $category, $no_of_copy, $status, $bookid);
    $result = $statement->execute();

    if (!$result) {
        $errorMessage = "Invalid query: " . $connection->error;
    } else {
        $successMessage = "Book modified correctly";
        header("location: /cultur/atelierspace.php");
        exit;
    }
}

// Fetch categories for the select dropdown
$sql = "SELECT * FROM `category`";
$result = $connection->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/books.js"></script>
</head>
<body>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-plus"></i>Add book</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="control-label">Book</label>
                    <input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="Book Name" value="<?php echo $name; ?>"/>
                </div>
                <div class="form-group">
                    <label for="picture" class="control-label">Photo</label>
                    <input type="file" name="picture" id="picture" autocomplete="off" class="form-control" placeholder="Picture">
                </div>
                <div class="form-group">
                    <label for="isbn" class="control-label">ISBN No</label>
                    <input type="text" name="isbn" id="isbn" autocomplete="off" class="form-control" placeholder="ISBN No" value="<?php echo $isbn; ?>"/>
                </div>
                <div class="form-group">
                    <label for="category" class="control-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['categoryid']; ?>" <?php echo $category == $cat['categoryid'] ? 'selected' : ''; ?>><?php echo $cat['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_of_copy" class="control-label">No of copy</label>
                    <input type="number" name="no_of_copy" id="no_of_copy" autocomplete="off" class="form-control" placeholder="No of copy" value="<?php echo $no_of_copy; ?>"/>
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">Auteur</label>
                    <input type="text" name="status" id="status" autocomplete="off" class="form-control" placeholder="Nom de l'auteur" value="<?php echo $status; ?>"/>
                </div>
                <input type="hidden" name="bookid" value="<?php echo $bookid; ?>">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
