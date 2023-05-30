<?php
$conn = mysqli_connect('localhost','root','','cultuermb');

$name="";
$status="";

$errorMessage="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD'] =='POST'){
 $name=filter_var($_POST["name"],FILTER_SANITIZE_STRING);
$status=$_POST["status"];
do{
 if(empty($name)||empty($status)){
     $errorMessage="All the fields are required";
     break;
 }
      //add new client to database
      $sql = "INSERT INTO `category` (name,status) VALUES ('$name','$status')";
      $result=$conn->query($sql); 
      if(!$result){
         $errorMessage="Invalid query" .$conn->error;
         break;
      }

      $name="";
      $status="";

      
      header("location: /cultur/category.php");
      exit;

}while(false);
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
                <label for="Income" class="control-label">Category Name</label>              
                <input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="category name"/>
                                                
              </div>
              
              <div class="form-group">
                <label for="country" class="control-label">Status</label>             
                <select class="form-control" id="status" name="status">
                  <option value="">Select</option>             
                  <option value="Enable">Enable</option>
                  <option value="Disable">Disable</option>               
                </select>             
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