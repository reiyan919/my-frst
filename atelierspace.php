

	 
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
                        <a href="dashboard.php">
                        <li>
                            <span class="las la-clipboard-list"></span>
                            <span>Demand d'Emprunt</span>
                        </li>
                        </a>
                        <li>
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
                            <form method="GET" action="">
                        <input type="search" name="search" placeholder="Search here" />
                          </form>
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
        <a href="class/Books.php" class="btn btn-dark mb-3">Ajouter</a>
        <table class="table table-hover text-center">
				<thead class="table-dark">
					<tr>						
						<td></td>
						<th>Book</th>
                        <th>Picture</th>
						<th>ISBN</th>	
						<th>Category</th>
						<th>No of copy</th>						
						<th>Auteur</th>	
						<th>Updated On</th>							
						<th></th>
						<th></th>					
					</tr>
				</thead>
                <tbody>
                <?php
    include('inc/conx.php');

    // Check if the search form is submitted and ISBN is provided
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $isbn = $_GET['search'];

        // Query to check if the ISBN exists in the database
        $searchQuery = "SELECT * FROM book WHERE isbn = '$isbn'";
        $searchResult = $conn->query($searchQuery);

        if(!$searchResult){
            die("Invalid query: " . $conn->error);
        }

        // If the ISBN exists, display the book information
        if($searchResult->num_rows > 0){
            while($row = $searchResult->fetch_assoc()){
                echo "
                    <tr>
                        <td>$row[bookid]</td>
                        <td>$row[name]</td>
                        <td><img src='cultur/image/$row[picture]' width='100' height='100'></td>
                        <td>$row[isbn]</td>
                        <td>$row[categoryid]</td>
                        <td>$row[no_of_copy]</td>
                        <td>$row[auteur]</td>
                        <td>$row[update_on]</td>
                        <td>
                            <a href='/cultur/edit/editbook.php?bookid=$row[bookid]' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
                            <a href='/cultur/delet/deletebook.php?bookid=$row[bookid]' class='link-dark'><i class='fa-solid fa-trash fs-5'></i></a>
                        </td>
                    </tr>
                ";
            }
        } else {
            // If the ISBN does not exist, display a message
            echo '
                <tr>
                    <td colspan="10">No book found for the provided ISBN.</td>
                </tr>
            ';
        }
    } else {
        // Display all books if search form is not submitted or ISBN is not provided
        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);

        if(!$result){
            die("Invalid query: " . $conn->error);
        }

        while($row = $result->fetch_assoc()){
            echo "
                <tr>
                    <td>$row[bookid]</td>
                    <td>$row[name]</td>
                    <td><img src='cultimg/$row[picture]' width='100' height='100'></td>
                    <td>$row[isbn]</td>
                    <td>$row[categoryid]</td>
                    <td>$row[no_of_copy]</td>
                    <td>$row[auteur]</td>
                    <td>$row[update_on]</td>
                    <td>
                        <a href='/cultur/edit/editbook.php?bookid=$row[bookid]' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
                        <a href='/cultur/delet/deletebook.php?bookid=$row[bookid]' class='link-dark'><i class='fa-solid fa-trash fs-5'></i></a>
                    </td>
                </tr>
            ";
        }
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