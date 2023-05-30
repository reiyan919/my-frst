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
        <div class="main h-100">
            <div class="top-bar">
            <div class="search mb-3">
  <input type="text" name="search" placeholder="Search here">
  <label for="search"><i class="fas fa-search"></i></label>
</div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="file:///C:/Users/MATRIX%20COMPUTER/Desktop/cultimg/20230215_144418.jpg">
                </div>
            </div>
            <div class="container flex-grow-1">
                <h2 class="mt-30">réservation</h2>
                

                <?php
                  $conn = mysqli_connect('localhost','root','','cultuermb');
                  
                  
                  $query="SELECT * FROM `reservation`";
                  $query_run=mysqli_query($conn,$query);
                ?>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>numero de telphone</th>
                            <th>age</th>
                            <th>événement</th>
                            <th>Nb de tick</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          if(mysqli_num_rows($query_run)>0){
                            foreach($query_run as $row){
                                ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['nb_tlphon'];?></td>
                                    <td><?php echo $row['age'];?></td>
                                    <td><?php echo $row['event'];?></td>
                                    <td><?php echo $row['number_billets'];?></td>
                                </tr>
                                <?php
                            }
                          }
                          else{
                            ?>
                            <tr>
                                <td>id</td>
                                <td>id</td>
                            </tr>
                            <?php
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

