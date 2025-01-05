<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Retour à l'Acceuil</a>
    <form action="" method ="POST" name="ajoute">
    <label for="titre">Titre : </label>
    <input type="text" id="titre" name="titre" autofocus  >
    <br><br>
    <label for="desc">Description : </label>
    <input type="text" id="desc" name="desc" >
    <input type ="submit" value ="enregistrer">
</form>
    
</body>
</html>
<?php
if (isset($_POST['titre'])&& isset($_POST['desc'])) {
    $subject = 'Message de ' . $_POST['titre'];
    $pdo = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
    $result = $pdo->prepare('INSERT INTO taches(titre, description) VALUES (:titre, :description)');
    $result->execute(array(
        'titre' => $_POST['titre'],
        'desc' => $_POST['desc']  
    ));

    echo "Données insérées avec succès.";


}
 else {
    echo "Info manquante ou action non spécifiée.";
}

?>