<?php
$conn = mysqli_connect('localhost','root','','cultuermb');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $ensenginant=$_POST['ensenginant'];
    $age=$_POST['age'];
    $emploi_de_temps=$_POST['emploi_de_temps'];
    $Duree	=$_POST['Duree'];
    $salle	=$_POST['salle'];
    $prix=$_POST['prix'];

    $sql="INSERT INTO atelier(name,ensenginant,age,emploi_de_temps,Duree,salle,prix) VALUES('$name','$ensenginant','$age','$emploi_de_temps','$Duree','$salle','$prix')";
    $result=$conn->query($sql);
    if($result){
      header("location: /cultur/atlrs.php");

    }else{
        echo"Falied: ".mysqli_error($conn);
         }

}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ََAtelier</title>
</head>
<body>
   
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Emploi de temps</h3>
    <p class="text-muted"> Complete the form to add Emploi de temps</p>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="atlr.php" method="post" style="width:50vw; min-width:300px;">
        <div class="row">
        <div class="form-group">
       <label for="category" class="control-label">Name</label>
       <input type="text" class="form-control" name="name" placeholder="alelier de ....">
    </div>
        <div class="row">
        <div class="form-group">
       <label for="category" class="control-label">Ensenginant</label>
       <input type="text" class="form-control" name="ensenginant" placeholder="le prof">
    </div>
    <div class="row">
        <div class="form-group">
       <label for="category" class="control-label">Age</label>
       <input type="text" class="form-control" name="age" placeholder="12-19">
    </div>
    <div class="col">
        <label class="form-label">Emploi de temps </label>
        <input type="text" class="form-control" name="emploi_de_temps" placeholder="jeudi a 14h">
    </div>
    <div class="col">
        <label class="form-label">Duree </label>
        <input type="text" class="form-control" name="Duree" placeholder="1h">
    </div>
    <div class="mb-3">
        <label class="form-label">Salle</label>
        <input type="text" class="form-control" name="salle" placeholder="Salle de ...">
    </div>
    <div class="row">
        <div class="form-group">
       <label for="category" class="control-label">Prix</label>
       <input type="text" class="form-control" name="prix" placeholder="3000DZ">
    </div>
    
      <div class="mt-3">
        <input type="submit" class="btn btn-success" name="submit" value="Save">
        <a href="inde.php" class="btn btn-danger">Cancel</a>
        </div>


      </div>
      </form>
     </div>

    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>