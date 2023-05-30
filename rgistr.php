
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Liste of artiset </h2>
        <a class="btn btn-primary" href="/cultur/creat.php" rol="button">New artiset</a>
        <br>
        <table class="table">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>phone</th>
                    <th>PHOTO</th>
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
                                <a class='btn btn-primary btn-sm' href='/cultur/edit.php?id=$row[id]'>Edit</a>
                                </td>
                             <td>
                                <a class='btn btn-danger btn-sm' href='/cultur/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                                ";

                            }
                           ?>
                       </tbody>
        </table>
    </div>
    
</body>
</html>