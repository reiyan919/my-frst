<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');
if (isset($_POST['save_spc_image'])) {
    $name = $_POST['name'];
    $salle = $_POST['salle'];
    $image = $_FILES['image']['name'];
    $date = $_POST['date'];
    $definition = $_POST['definition'];

    $query = "INSERT INTO `spectacle` (name, salle, image, date,definition) VALUES ('$name','$salle', '$image', '$date','$definition')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "cultimg/" . $_FILES["image"]["name"]);
        $_SESSION['status'] = "Image stored successfully";
        header('<location:/cultur/admiin.php');
        exit;
    } else {
        $_SESSION['status'] = "Image non insérée !";
        header('location: /cultur/admiin.php');
        exit;
    }
}

$sql = "SELECT id, name FROM salle";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Spectacl</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Ajouter Spct</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hy!</strong> <?php echo $_SESSION['status'];?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                        }
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter le name">
</div>
<div class="form-group">
    <label for="salle" class="control-label">Salle</label>
    <select name="salle" id="salle" class="form-control">
        <option value="">Select</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" <?php echo isset($salle) && $salle == $category['id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control" placeholder="Image">
</div>
<div class="form-group">
    <label for="">Date</label>
    <input type="date" name="date" class="form-control" placeholder="Enter la date">
</div>
<div class="form-group">
    <label for="">Definition</label>
    <input type="text" name="definition" class="form-control" placeholder="Enter le definition">
</div>
<div class="form-group">
    <button name="save_spc_image" class="btn btn-primary mt-3">Enregister</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>


<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
