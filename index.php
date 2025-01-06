<?php
include_once "connect.php";

$sql = "SELECT * FROM taches";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tâches</title> 
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <h1>Liste des tâches</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['titre'] ?></td>
                <td><?= $row['description'] ?></td>
                <td>
                    <a href="modification.php?id=<?= $row['id'] ?>">Modifier</a>
                    <a href="suppression.php?id=<?= $row['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="ajout.php">Ajouter une tâche</a>
</body>
</html>