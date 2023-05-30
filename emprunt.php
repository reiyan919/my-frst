<?php
include('inc/conx.php');
$errorMessage = '';
$successMessage = '';

if (isset($_POST['submit'])) {
    $username = stripcslashes($_POST['username']);
    $name = stripcslashes(strtolower($_POST['name']));
    $email = $_POST["email"];
    $password = stripcslashes($_POST['password']);

    $name = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    // Prepare the statement
    $stmt = $conn->prepare("SELECT * FROM `abonn` WHERE email='$email' AND password='$password'");

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check the number of rows
    $num_rows = $result->num_rows;

    if ($num_rows == 0) {
        $errorMessage = '<p id="error">L’utilisateur n’est pas enregistré.</p><br>';
    }

    if (empty($name)) {
        $errorMessage = '<p id="error">Veuillez entrer le nom du livre.</p><br>';
    } elseif (filter_var($name, FILTER_VALIDATE_INT)) {
        $errorMessage = '<p id="error">Veuillez entrer un nom valide et non un numéro.</p><br>';
    }

    if (empty($email)) {
        $errorMessage = '<p id="error">Veuillez insérer un courriel.</p><br>';
    }

    

    if (empty($errorMessage)) {
        $sql = "INSERT INTO `empurnt`(`id`,`username`,`email`, `name`) VALUES (NULL ,'$email','$username', '$name')";
        mysqli_query($conn, $sql);
        $successMessage = 'Demandez avec succès.';
        header('Location: accuil.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>emprunt</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,400;1,400&family=Josefin+Slab:ital,wght@0,400;1,500&family=Noto+Nastaliq+Urdu&family=Poppins&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <div class="contrainer">
   

        <form class="form-signup" action="" method="post">
        <?php
                    if (!empty($errorMessage)) {
                        echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
                    }
                    if (!empty($successMessage)) {
                        echo '<div class="alert alert-success" role="alert">' . $successMessage . '</div>';
                    }
                    ?>

            <h2>Emprunt</h2>
            <p>Confirmer vous informations </p>
            <div class="col-10 ms-5 mt-3 ">
                <input type="email" id="email" name="email" class="form-control" placeholder="Adresse email">
            </div>
            <div class="col-10 ms-5 mt-3 ">
                <input type="text" id="username" name="username" class="form-control" placeholder="voter nom">
            </div>
            <div class="col-10 ms-5 mt-3">
    <select id="name" name="name" class="form-control">
        <option value="">Select a book</option>
        <?php
        $query = "SELECT name FROM `book`";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        }
        ?>
    </select>
</div>

            
                
         
            
            <div class="col-5 ms-5 mt-3 ">
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            
           
            
           
            <div class="col-5 ms-5 mt-3">
                <input type="submit" name="submit" id="submit" value="Emprunt"class="btn btn-lg btn-primary w-100 fs-6"><br>
             </div>
        </form>
    </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>