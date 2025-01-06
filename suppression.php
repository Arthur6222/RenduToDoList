
<?php
$idtache = $_GET['id'];
include_once "connect.php";
$sql = "DELETE FROM taches where id = $idtache";
if(mysqli_query($conn, $sql)){
    header("location : index.php?");
} else {
    header("location : index.php?");
}
?>