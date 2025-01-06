<?php
include_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $sql = "INSERT INTO taches (titre, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $titre, $description);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
    } else {
        echo "Erreur lors de l'ajout de la tâche : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title> 
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <h1>Ajouter une tâche</h1>
    <form method="post">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" required>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>