<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');

$name = "";
$email = "";
$birthday = "";
$phone = "";
$photo = "";
$outile = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $birthday = filter_var($_POST["birthday"], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $outile = filter_var($_POST["outile"], FILTER_SANITIZE_STRING);
    
    // Check if a file is selected
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name'];
        
        // Add new artist to the database
        $stmt = $conn->prepare("INSERT INTO artiset (name, email, birthday, phone, photo, outile) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $birthday, $phone, $photo, $outile);
        
        if ($stmt->execute()) {
            // Move uploaded file to desired location
            move_uploaded_file($_FILES["photo"]["tmp_name"], "cultimg/" . $_FILES["photo"]["name"]);
            $_SESSION['status'] = "Image stockée avec succès";
            header("Location: /cultur/artist.php");
            exit;
        } else {
            $errorMessage = "Requête non valide : " . $conn->error;
            header("Location: /cultur/artist.php");
            exit;
        }
    } else {
        $errorMessage = "Veuillez sélectionner un fichier.";
    }
   
}
?>
<!-- Rest of your HTML code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container my-5">
    <h2>New artiset</h2>

    <?php if(!empty($errorMessage)){
              echo"
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>$errorMessage</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
              </div>";
    }
    
    ?>
    <form method="post" enctype="multipart/form-data">

        <div class="row mb-3">
             <label  class="col-sm-3 col-form-label">Nom</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
             </div>
        </div>
        <div class="row mb-3">
             <label  class="col-sm-3 col-form-label">Email</label>
             <div class="col-sm-6">
                <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
             </div>
        </div>
        <div class="row mb-3">
             <label  class="col-sm-3 col-form-label">qui</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" name="birthday" value="<?php echo $birthday;?>">
             </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-6">
        <input type="file" class="form-control" name="photo" value="<?php echo $photo;?>">
        </div>
      </div>
             <div class="row mb-3">
             <label  class="col-sm-3 col-form-label">Telephone</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
             </div>
        </div>
        <div class="row mb-3">
             <label  class="col-sm-3 col-form-label">outile</label>
             <div class="col-sm-6">
                <input type="text" class="form-control" name="outile" value="<?php echo $outile;?>">
             </div>
        </div>
        </div> 
        <?php if(!empty($successMessage)){
              echo"
              <div class='row mb-3'>
              <div class='offset-sm-3 col-sm-6'>
              <div type='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>$successMessage</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
              </div>
              </div>
              </div>";
    }
        
        ?>
         <div class="row mb-3">
             <div  class="offset-sm-3 col-sm-3 d-grid">
             <button type="submit" class="btn btn-primary">Submit</button>
             </div>
             <div  class=" col-sm-3 d-grid">
             <button  class="btn btn-outline-primary" href="/cultur/rgistr.php" role="button">Cancel</button>
             </div>
        </div>
    </form>
  </div>
</body>
</html>