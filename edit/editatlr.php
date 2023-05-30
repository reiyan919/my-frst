<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cultuermb";

$connection = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET["id"])) {
        header("location: /cultur/artist.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM `atelier` WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: /cultur/atlrs.php");
        exit;
    }

    $name = $row["name"];
    $ensenginant = $row['ensenginant'];
    $emploi_de_temps = $row["emploi_de_temps"];
    $Duree = $row["Duree"];
    $salle = $row["salle"];
    $prix = $row['prix'];
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST method: Update the data of the client

    $id = $_POST["id"];
    $name = $_POST["name"];
    $ensenginant = $_POST['ensenginant'];
    $emploi_de_temps = $_POST["emploi_de_temps"];
    $Duree = $_POST["Duree"];
    $salle = $_POST["salle"];
    $prix = $_POST['prix'];

    $sql = "UPDATE `atelier` SET name=?, ensenginant=?, emploi_de_temps=?, Duree=?, salle=?, prix=? WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssisssi", $name, $ensenginant, $emploi_de_temps, $Duree, $salle, $prix, $id);
    $result = $statement->execute();

    if ($result) {
        $successMessage = "Emploi de Temps modified correctly";
        header("location: /cultur/atlrs.php");
        exit;
    } else {
        $errorMessage = "Invalid query: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtm
    B46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Atelier</title>
</head>
<body>
   
<div class="container">
    <div class="text-center mb-4">
        <h3>Edit Emploi de Temps</h3>
        <p class="text-muted">Complete the form to edit Emploi de Temps</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width:50vw; min-width:300px;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            </div>

            <div class="form-group">
                <label for="ensenginant" class="control-label">Ensenginant</label>
                <input type="text" class="form-control" name="ensenginant" value="<?php echo $ensenginant; ?>">
            </div>

            <div class="form-group">
                <label for="emploi_de_temps" class="control-label">Emploi de temps</label>
                <input type="text" class="form-control" name="emploi_de_temps" value="<?php echo $emploi_de_temps; ?>">
            </div>

            <div class="form-group">
                <label for="Duree" class="control-label">Duree</label>
                <input type="text" class="form-control" name="Duree" value="<?php echo $Duree; ?>">
            </div>

            <div class="form-group">
                <label for="salle" class="control-label">Salle</label>
                <input type="text" class="form-control" name="salle" value="<?php echo $salle; ?>">
            </div>

            <div class="form-group">
                <label for="prix" class="control-label">Prix</label>
                <input type="text" class="form-control" name="prix" value="<?php echo $prix; ?>">
            </div>
            
            <div class="mt-3">
                <input type="submit" class="btn btn-success" name="submit" value="Save">
                <a href="/cultur/altlrs.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
