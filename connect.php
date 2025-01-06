<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("erreur" . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="todo.css">
</head>
<body>
    
</body>
</html>