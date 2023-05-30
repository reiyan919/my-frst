<?php
include('inc/conx.php');
if(isset($_POST['submit'])){  
    $username = stripcslashes(strtolower($_POST['username']));
    $email = stripcslashes($_POST['email']);
    $status=$_POST["status"];
    if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year'])){
        $birthday_day = (int)$_POST['birthday_day'];
        $birthday_month = (int)$_POST['birthday_month'];
        $birthday_year = (int)$_POST['birthday_year'];
        $birthday = htmlentities(mysqli_real_escape_string($conn,$birthday_day.'-'.$birthday_month.'-'.$birthday_year));
    }
    $username = htmlentities(mysqli_real_escape_string($conn,$_POST['username']));  
    $email =    htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    
   $check_user = "SELECT * FROM `abonn` WHERE username='$username'";
   $check_result = mysqli_query($conn,$check_user);
   $num_rows = mysqli_num_rows($check_result);
   if($num_rows != 0){
    $user_error = '<p id="error"> sorry usernam already exist,change another one <p><br>';
   }


    if(empty($username)){
        $user_error = '<p id="error"> Please enter username <p> <br>';
       
        
    }elseif(strlen($username) < 6 ){
        $user_error ='<p id="error"> Your username needs to have a minimum of 6 letters <p><br> ';
       
       

    }elseif(filter_var($username,FILTER_VALIDATE_INT) ){
        $user_error ='<p id="error"> Please enter a valid username not a number <p><br> ';
     
      

    }

    if(empty($email)){
        $email_error = '<p id="error"> Please insert email <p> <br>';
       
        
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $email_error = '<p id="error"> Please enter a valid email <p><br>';
       
    }

    if(empty($birthday)){
        $birthday_error = '<p id="error"> Please insert date of birthday <p><br>';
       
        
    }

    if(empty($password)){
        $password_error = '<p id="error"> Please insert password <p><br>';
        
        include('register.php');
    }elseif(strlen($password) < 6 ){
        $password_error ='<p id="error"> Your password needs to have a minimum of 6 letters <p><br> ';
        
        include('register.php');
    }


    else{
        if( ($num_rows == 0)) {
            $sql = "INSERT INTO `abonn`(`id`,`username`,`email`,`password`,`birthday`,`status`)
            VALUES (NULL,'$username','$email','$password','$birthday','$status')";
            mysqli_query($conn,$sql);
            header('location:inc/conx.php');
        }else{
            include ('tyt.php');
        }

}
} 


?>