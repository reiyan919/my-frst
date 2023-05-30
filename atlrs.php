

	 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="atelir.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <title>Admin</title>
</head>
<body>
             <div class="sidebar">
                <div class="sidebar-brand">
                    <h2><span class="lab la-accusoft"></span>Les Atelliers</h2>
                </div>
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="atelierspace.php" class="active">
                            <span>gestion de la bibliothèque</span></a>
                        </li>
                        <li>
                            <a href="category.php"><span class="las la-users"></span>
                            <span>Category</span></a>
                        </li>
                        <li>
                            <a href="listbib.php"><span class="las la-users"></span>
                            <span>Liset d'inscrire</span></a>
                        </li>
                        <li>
                            <a href="dashboard.php"><span class="las la-clipboard-list"></span>
                            <span>Demand d'Emprunt</span></a>
                        </li><li>
                            <a href="culter/not.php"><span class="las la-shipping-bag"></span>
                            <span>Notification</span></a>
                        </li>
                        <li>
                            <a href=""><span class="las la-users-circle"></span>
                            <span>Accounts</span></a>
                        </li>
                        <li>
                            <a href="atlrs.php" class="active">
                            <span>Gestion des alteliers</span></a>
                        </li>
                        <li>
                            <a href="listatlr.php"><span class="las la-users"></span>
                            <span>Liset d'inscrire</span></a>
                        </li>
                        
                    </ul>
                </div>
             </div> 
        <div class="main-content">
             <header>
                <h2>
                    <label for="">
                        <span class="las la-bars"></span>
                    </label>
                    Dashboard
                    </h2>
                    <div class="search-wrapper">
                        <span class="las la-search"></span>
                        <input type="search" placeholder="Search here"/>
                    </div>
                    <div class="user-wrapper">
                        <img src="#" width="40px" height="40px">
                        <div>
                            <h4>Saaid</h4>
                            <small>super admin</small>
                        </div>
                    </div>
             </header>
             <main>
             <?php
    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

          ?>
    <div class="container">
        <a href="class/atlr.php" class="btn btn-dark mb-3">Ajouteur</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Ensenginant</th>
                <th scope="col">Emploi</th>
                <th scope="col">Duree</th>
                <th scope="col">Salle</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>
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
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[ensenginant]</td>
        <td>$row[emploi_de_temps]</td>
        <td>$row[Duree]</td>
        <td>$row[salle]</td>
        <td>$row[prix]</td>
        <td>
        <a href='edit/editatlr.php?id=$row[id]' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
         <a href='delet/deletaltr.php?id=$row[id]' class='link-dark'><i class='fa-solid fa-trash fs-5'></i></a>
        
        </td>
    </tr>
    ";
}
?>
                
               
				</tbody>
			</table>				
			</div>
		</div>	
             </main>
			
        </div> 
</body>
</html>