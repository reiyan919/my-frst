<?php
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');
if (isset($_GET["id"])){
    $id=$_GET["id"];

     $sql="DELETE FROM atelier WHERE id=$id";
     $conn->query($sql);
}
header("location: /cultur/atlrs.php");
exit;
?>