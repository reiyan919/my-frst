<?php
$conn = mysqli_connect('localhost', 'root', '', 'cultuermb');
if (isset($_GET["id"])){
    $id=$_GET["id"];

     $sql="DELETE FROM artiset WHERE id=$id";
     $conn->query($sql);
}
header("location: /cultur/artist.php");
exit;
?>