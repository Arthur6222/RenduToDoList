<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="todo.css">
    <title>Liste des tâches à réaliser</title>
</head>
<body>
<main>
    <div class="link_container">
        <a class="link" href="ajout.php">Ajouter une tâche</a>
    </div>

    <table>
        <thead>
            <?php
            include_once "connect.php";
            $sql = "SELECT * FROM taches"; 
            $resultat = mysqli_query($conn, $sql);
            if (mysqli_num_rows($resultat) > 0) {
            ?>
            <tr>
                <th>Titre de la tâche</th>
                <th>Description</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($resultat)) {
            ?>
            <tr>
                <td><?=$row['titre']?></td>
                <td><?=$row['description']?></td>
                <td class="image"><a href="modification.php?id=<?=$row['id']?>"><img src="write.png" alt="Modifier"></a></td>
                <td class="image"><a href="suppression.php?id=<?=$row['id']?>"><img src="remove.png" alt="Supprimer"></a></td>
            </tr>
            <?php
            }
            } else {
                echo "<p class='message'>Aucunes tâches à faire</p>";
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>


