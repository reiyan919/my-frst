<?php
$conn = mysqli_connect('localhost','root','','cultuermb');

$name="";
$status="";

$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] =='POST'){
 $datetr=filter_var($_POST["datetr"],FILTER_SANITIZE_STRING);
 $datert=filter_var($_POST["datert"],FILTER_SANITIZE_STRING);

      //add new client to database
      $sql = "INSERT INTO `demprunt`(date_trover,Date_retour) VALUES ('$datetr','$datert')";
      $result=$conn->query($sql); 
      if($result){
        header("location: /cultur/dashboard.php");
  
      }else{
          echo"Falied: ".mysqli_error($conn);
           }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
  <title>Document</title>
</head>
<body>

<div class="modal-body">    
<form method="post">    
<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"></button>
							<h4 class="modal-title"><i class="fa fa-plus"></i>+ Ajouter Categorie</h4>
						</div>          
              
              <div class="form-group">             
                <label for="Income" class="control-label">Date trover</label>              
                <input type="date" name="datetr" id="datetr" autocomplete="off" class="form-control" placeholder="Date trover"/>
                                                
              </div>
              
              <div class="form-group">
                <label for="country" class="control-label"><Datag>Date router</Datag></label>
                <input type="date" name="datert" id="datert" autocomplete="off" class="form-control" placeholder="date router"/>
             
                            
              </div>        
              
                      </div>
                      

                  
                       <button onclick="saveBook()" class="btn btn-primary">Save</button>

          </div>
        
      </div>
    </div>  
        </form>
    </div>

    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min"></script>
		
</body>
</html>