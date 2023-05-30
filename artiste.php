<?php
      require_once 'inc/conx.php';
      $query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  $categories = array();
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acteur</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,400;1,400&family=Josefin+Slab:ital,wght@0,400;1,500&family=Noto+Nastaliq+Urdu&family=Poppins&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="ray.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
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
       <section class="acteur">
  <div class="container2">
    <div class="section-title">
      <h2>Acteurs et Artistes</h2>
      <div class="underline"></div>
      <p>Algériens ayant présenté des offres et des concerts au palais de la culture d'Annaba</p>
    </div>
    <div class="row">
      <?php

      $query = "SELECT * FROM artiset";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $nom = $row['name'];
          $description = $row['outile'];
          $image = "cultimg/" . $row['photo'];
          ?>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="acteurpic">
                <img src="<?php echo $image; ?>" class="img-fluid" alt="team1">
              </div>
              <div class="memer-info">
                <h4><?php echo $nom; ?></h4>
                <span><?php echo $description; ?></span>
                <div class="social">
                </div>
                <div class="social">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-google"></i></a>
            </div>
              </div>
            </div>
          </div>

          <?php
        }
      } else {
        echo "Aucun acteur trouvé.";
      }

      mysqli_close($conn);
      ?>
           
          </div>
            </div>
          </div>
          <script>
    $(document).on('click', '.dropdown-item', function() {
        var category = $(this).data('category');
        console.log('Selected category: ' + category);
    });
</script>

        


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>