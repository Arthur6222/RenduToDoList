<?php
include_once "connect.php";

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "SELECT * FROM taches WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titre = $_POST['titre'];
            $description = $_POST['description'];

            $sql = "UPDATE taches SET titre = ?, description = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $titre, $description, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php");
            } else {
                echo "Erreur lors de la mise à jour de la tâche : " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une tâche</title> 
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    <h1>Modifier une tâche</h1>
    <form method="post">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" value="<?= $row['titre'] ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" required><?= $row['description'] ?></textarea>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
<?php
        }
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>