<?php
      require_once 'inc/conx.php';
      $query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Fetch the categories into an array
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  // No categories found
  $categories = array();
}


          ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,400;1,400&family=Josefin+Slab:ital,wght@0,400;1,500&family=Noto+Nastaliq+Urdu&family=Poppins&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="ray.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="heading">
        <h1>Palais de la culture Mohamed Boudief </h1>
    </div>
    <nav>
    

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="cultimg/images.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="accuil.php">Accueil</a>
                  </li>
                 
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Bibliothèque
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="ord.php">Ordinateur et informations</a></li>
                      <li><a class="dropdown-item" href="pli.php">Philosophie et psychologie</a></li>
                      <li><a class="dropdown-item" href="#">religions</a></li>
                      <li><a class="dropdown-item" href="#">science sociale</a></li>
                      <li><a class="dropdown-item" href="#">Langues</a></li>
                      <li><a class="dropdown-item" href="#">Les sciences</a></li>
                      <li><a class="dropdown-item" href="#">technologie</a></li>
                      <li><a class="dropdown-item" href="#">les arts et le divertissement</a></li>
                      <li><a class="dropdown-item" href="#">littérature</a></li>
                      <li><a class="dropdown-item" href="#">Histoire et géographie</a></li>
                      
  
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Atelier 
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="atelier.php">Catégorie</a></li>
                      <li><a class="dropdown-item" href="dossier.html">dossier d'inscription</a></li>
  
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="artiste.php" >Acteur</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="resr.php" >Reservation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="llog.php">Contact</a>
                  </li>
                  <nav class="navbar bg-body-tertiary">
                      <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
                </ul>
              </div>
            </div>
          </nav>
                
              </div>
               
        
        </u1>
       </nav>
  <div class="container my-5">
    <h2>Reservation Form</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cultuermb";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    if (isset($_POST['submit'])) {
$name = $_POST['name'];
$nb_tlphon = $_POST['nb_tlphon'];
$age = $_POST['age'];
$event = $_POST['event'];
$number_billets = $_POST['number_billets'];


      if ($age < 18) {
        $message = "Désolé, vous devez avoir 18 ans ou plus pour faire une réservation.";
      } else {
        $sql = "SELECT * FROM reservation WHERE name = '$name'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
          $message = "Désolé, vous avez déjà réservé.";
        } else {
          $sql = "INSERT INTO `reservation` (name, nb_tlphon, age, event, number_billets) VALUES ('$name', '$nb_tlphon', '$age', '$event', '$number_billets')";
          if ($connection->query($sql) === TRUE) {
            $message = "Réservation effectuée avec succès.";
          } else {
            $message = "Error: " . $sql . "<br>" . $connection->error;
          }
        }
      }

if (isset($message)) {
  if (strpos($message, 'Error') !== false) {
    echo '<div class="alert alert-danger">' . $message . '</div>';
  } else {
    echo '<div class="alert alert-info">' . $message . '</div>';
  }
}

    }
    $sql = "SELECT id, name FROM spectacle";
    $result = mysqli_query($connection, $sql);
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    
    $connection->close();
?>


    <form method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="event" class="form-label">Numéro de téléphone :</label>
        <input type="text" class="form-control" id="nb_tlphon" name="nb_tlphon" required>
      </div>
      <div class="mb-3">
        <label for="event" class="form-label">Age :</label>
        <input type="text" class="form-control" id="age" name="age" required>
      </div>
      <div class="mb-3">
        <label for="event" class="form-label">événement:</label>
        <select name="event" id="event" class="form-control">
      <option value="">Select</option>
      <?php foreach ($events as $event): ?>
        <option value="<?php echo $event['name']; ?>" <?php echo isset($_POST['event']) && $_POST['event'] == $event['name'] ? 'selected' : ''; ?>>
  <?php echo $event['name']; ?>
</option>
      <?php endforeach; ?>
    </select>
      </div>
      <div class="mb-3">
        <label for="event" class="form-label">Nombre de billets</label>
        <input type="text" class="form-control" id="number_billets" name="number_billets" required>
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">réserver des billets</button>
    </form>
  </div>

  <script>
    // Handle category selection
    $(document).on('click', '.dropdown-item', function() {
        var category = $(this).data('category');
        // Perform desired action based on selected category
        console.log('Selected category: ' + category);
    });
</script>

        


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
