
<?php 
session_start();
include('inc/conx.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if the email and password have been submitted
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      // Check if the email and password match saaid12@gmail.com
      if ($email == 'saaid12@gmail.com' && $password == 'saaid12') {
          // Redirect to atelierspace.php
          header('Location: atelierspace.php');
          exit();
      }
      
      // Check if the email and password match mohamed12@gmail.com
      if ($email == 'mohamed12@gmail.com' && $password == 'mohamed12') {
          // Redirect to admiin.php
          header('Location: admiin.php');
          exit();
      }
      
      // If the email and password do not match either of the above, display an error message
      echo 'Invalid email or password. Please try again.';
  }
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
                
              </div>
               
        
        </u1>
       </nav>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="row border rounded-5 p-3 bg-white shadow box-area">

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"style="background:#103cbe">
        <div class="featured-image mb-3">
            <img src="cultimg/illustration-scooter-workday-people-1.png" class="img-fluid" style="width: 800px;">
        </div>
        <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Etre vérifié</p>
        <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Rejoignez-nous sur cette plateforme</small>

       </div>
      <div class="col-md-6 right-box" >
        <div class="row align-items-center">
           <div class="header-text mb-4">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: large;">Rebonjour</p>
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: larger;">Bienvenue chez nous</p>
           </div>
           <form action="llog.php" method="post">
            <?php
            if(isset($errors)){
              if(!empty($errors)){
                foreach($errors as $msg){
                  echo $msg . "<br>";
                }
              }
            } ?>
          
           <div class="input-group mb-3">
            <input type="email" class="form-control form-control-lg bg-light fs-6 " placeholder="Enter voter Email " name="email" value="<?php if(isset($_post['email'])){echo $_post['email'];} ?>">
        </div>

      
        <div class="input-group mb-1">
            <input type="password" class="form-control form-control-lg bg-light fs-6 " placeholder="mot de passe " name="password">
        </div>
        <div class="input-group mb-5 d-flex justify-content-between">
           <div class="form-check">
            <input type="checkbox" class="form-check-input" id="formCheck">
            <label for="formCheck" class="form-check-label text-secondary"><small>souviens-toi de moi</small></label>
           </div> 
           <div class="forget">
            <small><a href="#">Mot de passe oublié</a></small>
           </div>
        </div>
        <div class="input-group mb-3">
           <input type="submit" class="btn btn-lg btn-primary w-100 fs-6" name="submit" value="Conecter">
        </div>
        </form>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-primary w-100 fs-6" herf="cultur/rgistr.php"><img src="img/unnamed.png" style="width: 20px;" class="me-2"><small>Se connecter avec google</small></button>
         </div>
         <div class="row">
            <small>Je n'ai pas de compte <a href="cultur/insc.php">s'inscrire</a></small>
         </div>
         </div>


      </div>






</div>








    </div>   
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>