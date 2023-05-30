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
                 <i class="fas fa-th-large"></i>
                 <div class="title">Spectacle</div>
            </a>
            </li>
            <li>
                <a href="adminrsrv.php">
                 <i class="fas fa-question"></i>
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
                <a href="#">
                 <i class="fas fa-cog"></i>
                 <div class="title">Accont</div>
            </a>
            </li>
            </ul>
        </div>
        <div class="main mt-8">
        <div class="top-bar">
                <div class="search">
                    <input type="text" name="search" placeholder=" Search here">
                    <label for="search"><i class="fas fa-search"></i></label>
                </div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="file:///C:/Users/MATRIX%20COMPUTER/Desktop/cultimg/20230215_144418.jpg" >
                </div>
        <div class="container ">
        <h2>Liste of artiset </h2>
        <a class="btn btn-primary" href="class/creat.php" rol="button">Ajouteur artiset</a>
        <br>
        <table class="table">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Specilite</th>
                    <th>Telephone</th>
                    <th>Image</th>
                    <th>Outile</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
                       <tbody>
                       <?php
                            include('inc/conx.php');
                            $sql="SELECT * FROM artiset";
                            $result=$conn->query($sql);

                            if(!$result){
                                die("Invalid query" . $conn->error);
                            }
                            while($row=$result->fetch_assoc()){
                                echo"
                                <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[birthday]</td>
                            <td>$row[phone]</td>
                            <td><img src='cultimg/$row[photo]' width='100' height='100'></td>
                            <td>$row[outile]</td>


                            <td>
                                <a class='btn btn-primary btn-sm' href='/cultur/edit/edit.php?id=$row[id]'>Modifier</a>
                                </td>
                            <td>
                                <a class='btn btn-danger btn-sm' href='/cultur/delet/delete.php?id=$row[id]'>suprimier</a>
                            </td>
                        </tr>
                                ";

                            }
                           ?>
                       </tbody>
        </table>
    </div>  
           
        </div>
    </div>
</body>
</html>