
<?php
include_once "connect.php";

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "DELETE FROM taches WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
    } else {
        echo "Erreur lors de la suppression de la tâche : " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
    exit;
}
?>