<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque</title>
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
                  <form class="d-flex" role="search" method="GET" action="serch.php">
                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
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
       <section class="oeti">
       
            
        <div class="container2">
          <div class="section-title">
            <h2>Philosophie et psychologie</h2>
            <div class="underline"></div>
          </div>
          <div class="row">

          <?php
include 'inc/conx.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$category = 'Philosophie et psychologie';
$sql = "SELECT * FROM book WHERE categoryid = 'Philosophie et psychologie'";
$result = $conn->query($sql);

if ($result) {
  if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
      $bookName = $row['name'];
      $auteur = $row['auteur'];
      $picture = 'cultimg/' . $row['picture'];
      ?>
      <div class="col-md-4">
        <div class="card">
          <img src="<?php echo $picture; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $bookName; ?></h5>
            <p class="card-text"><?php echo $auteur; ?></p>
            <a href="emprunt.php" class="btn btn-primary">Emprunt</a>
          </div>
        </div>
      </div>
      <?php
    }
    echo '</div>';
  } else {
    echo "N'existe pas liver ' 'Philosophie et psychologie' category.";
  }
} else {
  echo "Error executing the query: " . $conn->error;
}

$conn->close();
?>

               
              </div>
            </div>
            
              
              


        </section>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".card-link").click(function(){
        $(".rounded").attr("src",$(this).parent().siblings().attr("Src"));
        $(".livre-name").text($(this).siblings("h2").text());
        $(".livre-desc").text($(this).siblings("div").find("p:nth(0)").text());
        $(".livre-price").text($(this).siblings("div").find("p:nth(1)").text());
        });
      $(window).resize(function(){
        if($(window).width()<600){
          $(".modal-content").css("transform","scaleX(1)");
        }
        else{
       $(".modal-content").css("transform" , "scaleX(1.4)");
       }
      });
         });
    </script>
    </body>

</html>