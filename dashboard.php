<?php
include('inc/conx.php');

$sql = "SELECT e.id, e.email,e.username, e.name, e.category, d.ide, d.date_trover, d.Date_retour
        FROM empurnt AS e
        INNER JOIN demprunt AS d
        ON e.id = d.ide";

$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}
?>

	 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="atelir.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <script src="js/books.js"></script>
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
            <div class="container-fluid">
	
			<div class="col-md-9 col-lg-10 main"> 
			<h2>Emprunt Books</h2> 
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h3 class="panel-title"></h3>
					</div>
                    <div class="col-md-2" >
                    

					</div>
					
				</div>
			</div>
			<table id="bookListing" class="table table-striped table-bordered" style="background-color: #;">
				<thead>
					<tr>						
						<td></td>
                        
                        <th>Name</th>
                        <th>email</th>
						<th>Nom de liver</th>
                        <th>Category</th>
						<th>date trover</th>						
						<th>date roteur</th>							
						<th></th>
						<th></th>					
					</tr>
				</thead>
                <tbody>
                <?php
while ($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>$row[id]</td>
        <td>$row[email]</td>
        
        <td>$row[username]</td>
        <td>$row[name]</td>
        <td>$row[category]</td>
        <td>";

    if ($row['date_trover'] != '') {
        echo $row['date_trover'];
    } else {
        echo "Date not set";
    }

    echo "</td>
        <td>";

    if ($row['Date_retour'] != '') {
        echo $row['Date_retour'];
    } else {
        echo "Date not set";
    }

    echo "</td>
        <td>
        <button class='btn btn-primary accept-btn' onclick='accepter(this)'><i class='fas fa-check'></i> Accepter</button>
        <button class='btn btn-primary accept-btn' onclick='modifier(this)'><a href='class/dateempr.php'><i class='fas fa-check'></i> Modifier</a></button>
        </td>
        <td>
        <button class='btn btn-danger delete-btn'><i class='fas fa-trash'></i> Delete</button>
        </td>
    </tr>";
}
?>

<script>
function accepter(btn) {
    btn.style.display = 'none'; // Hide the "Accepter" button
    btn.nextElementSibling.style.display = 'none'; // Hide the "Modifier" button
    btn.nextElementSibling.nextElementSibling.style.display = 'inline-block'; // Show the "Supprimer" button
}

function modifier(btn) {
    
    btn.style.display = 'none'; // Hide the "Modifier" button
    btn.previousElementSibling.style.display = 'none'; // Hide the "Accepter" button
    btn.nextElementSibling.style.display = 'inline-block'; // Show the "Supprimer" button
}

</script>


                       </tbody>
			</table>				
			</div>
		</div>	
             </main>
			
        </div> 
</body>
</html>