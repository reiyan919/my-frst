<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookname = mysqli_real_escape_string($conn, $_POST['name']);
    $picture = $_FILES['picture']['name'];
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $no_of_copy = mysqli_real_escape_string($conn, $_POST['no_of_copy']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    if (empty($bookname) || empty($picture) || empty($isbn) || empty($no_of_copy) || empty($category_name) || empty($status)) {
        $errorMessage = "tout les requet";
    } else {
        $category_query = "SELECT categoryid FROM category WHERE name = '$category_name'";
        $category_result = mysqli_query($conn, $category_query);
        $category_row = mysqli_fetch_assoc($category_result);
        $category_id = $category_row['categoryid'];

        $sql = "INSERT INTO book (name, picture, isbn, no_of_copy, categoryid, auteur, update_on)
        VALUES ('$bookname', '$picture', '$isbn', '$no_of_copy', '$category_name', '$status', NOW())";


        $result = mysqli_query($conn, $sql);
        if ($result) {
            move_uploaded_file($_FILES["picture"]["tmp_name"], "cultimg/" . $picture);
            $_SESSION['status'] = "Image stored succe";
            header('location: /cultur/atelierspace.php');
        } else {
            $_SESSION['status'] = "Image ";
            header('location: /cultur/atelierspace.php');
        }
    }
}

$sql = "SELECT name FROM category";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-plus"></i>Add book</h4>
                </div>
                <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="book" class="control-label">Book</label>
                            <input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="Book name" value="<?php echo isset($bookname) ? $bookname : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="book" class="control-label">Photo</label>
                            <input type="file" name="picture" id="picture" autocomplete="off" class="form-control" placeholder="Picture">
                        </div>
                        <div class="form-group">
                            <label for="book" class="control-label">ISBN No</label>
                            <input type="text" name="isbn" id="isbn" autocomplete="off" class="form-control" placeholder="ISBN number" value="<?php echo isset($isbn) ? $isbn : ''; ?>"/>
                        </div>
                        <div class="form-group">
    <label for="category" class="control-label">Category</label>
    <select name="category" id="category" class="form-control">
        <option value="">Select</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['name']; ?>" <?php echo isset($_POST['category']) && $_POST['category'] == $category['name'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>




                        <div class="form-group">
                            <label for="book" class="control-label">No of copy</label>
                            <input type="number" name="no_of_copy" id="no_of_copy" autocomplete="off" class="form-control" placeholder="Number of copies" value="<?php echo isset($no_of_copy) ? $no_of_copy : ''; ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="book" class="control-label">Auteur</label>
                            <input type="text" name="status" id="status" autocomplete="off" class="form-control" placeholder="Nom de auteur" value="<?php echo isset($status) ? $status : ''; ?>"/>
                        </div>
                        

                        
							
							

									
                         <button onclick="saveBook()" class="btn btn-primary">Save</button>
                         <button onclick="deleteBook()" class="btn btn-danger">Delete</button>
								</form>

                                

  </body>
</html>