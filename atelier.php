<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atelier</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,400;1,400&family=Josefin+Slab:ital,wght@0,400;1,500&family=Noto+Nastaliq+Urdu&family=Poppins&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="ray.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5"></script>
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script defer src="script.js"></script>

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
       
       <div class="container w-30 pt-5">
       <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nom de catégorie </th>
                <th>l'enseignant</th>
                <th>Emploi</th>
                <th>Date de l'étude</th>
                <th>Durée</th>
                <th>Le prix</th>
            </tr>
        </thead>
        <tbody>
        <?php
include('inc/conx.php');
$sql="SELECT* FROM atelier ";
$result=$conn->query($sql);

if(!$result){
    die("Invalid query" . $conn->error);
}
while($row=$result->fetch_assoc()){
    echo"
    <tr>
        <td>$row[name]</td>
        <td>$row[ensenginant]</td>
        <td>$row[emploi_de_temps]</td>
        <td>$row[Duree]</td>
        <td>$row[salle]</td>
        <td>$row[prix]</td>
       
    </tr>
    ";
}
?>
          
        </tbody>
       
    </table>
</div>
   
        


  
  </body>
</html>
