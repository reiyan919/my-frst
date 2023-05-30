<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin</title>
    
</head>
<body>
    <div class="containerr">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <div class="title">Brand Name</div>
                    </a>
                </li>
                <li>
                    <a href="admiin.php">
                        <i class="fas fa-question"></i>
                        <div class="title">Spectacle</div>
                    </a>
                </li>
                <li>
                    <a href="adminrsrv.php">
                        <i class="fas fa-th-large"></i>
                        <div class="title">réservation</div>
                    </a>
                </li>
                <li>
                    <a href="artist.php">
                        <i class="fas fa-users"></i>
                        <div class="title">Artist</div>
                    </a>
                </li>
                <li>
             <a href="logout.php?confirm=true">
               <i class="fas fa-sign-out-alt"></i>
               <div class="title">Déconnexion</div>
            </a>
               </li>

            </ul>
        </div>
        <div class="main">
            <div class="top-bar">
                <div class="search mb-3">
                    <input type="text" name="search" placeholder="Search here">
                    <label for="search"><i class="fas fa-search"></i></label>
                </div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="file:///C:/Users/MATRIX%20COMPUTER/Desktop/cultimg/20230215_144418.jpg">
                </div>
                <div class="tables">
                    <div class="last-appointments">
                        <div class="heading">
                            <h2>Spectacle</h2>
                            <a class="btn btn-primary" href="class/spctcl.php">Ajouter</a>
                        </div>
                        <?php
                        $conn = mysqli_connect('localhost','root','','cultuermb');

                        if(isset($_POST['delete_row'])){
                            $id = $_POST['id'];
                            $delete_query = "DELETE FROM spectacle WHERE id = $id";
                            mysqli_query($conn, $delete_query);

                            header('Location: admiin.php');
                        }

                        $query = "SELECT * FROM spectacle";
                        $query_run = mysqli_query($conn, $query);
                        ?>

                        <table class="appointment">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Salle</th>
                                    <th>Photo</th>
                                    <th>Date</th>
                                    <th>definition</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($query_run) > 0){
                                    while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                   
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['Salle']; ?></td>
                                    <td><img src="./cultimg/<?php echo $row['image']; ?>" width="100px" alt="Spectacle"></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['definition']; ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class='btn btn-danger btn-sm' name="delete_row">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                else{
                                ?>
                                <tr>
                                    <td colspan="6">No records found</td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
