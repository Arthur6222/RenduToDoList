<?php
    if(isset($_POST['send'])){
        if(isset($_POST['titre']) && 
            isset($_POST['description']) && 
            $_POST['titre'] != "" && 
            $_POST['titre'] != ""
            ){
            include_once "connect.php";
            extract($_POST);

            $sql = "INSERT INTO taches (titre, description) VALUES ('$titre', '$description')";
            if (mysqli_query($conn, $sql)){
                header("location : index.php");
            } else {
                header("location : ajout.php");
            }
        } else {
            header("location : ajout.php");
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title> 
    <link rel="stylesheet" href="todo.css"> 
</head>
<body>
    <form action="" method="post"> 
        <h1><strong>Ajouter une tâche</strong></h1> 
        <input type="text" name="titre" placeholder="Titre de la tâche" autofocus required> 
        <input type="text" name="description" placeholder="Description de la tâche" required> 
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="index.php">Voir les tâches</a>
    </form>
</body>
</html>