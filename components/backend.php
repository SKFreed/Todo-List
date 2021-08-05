<?php
$season = $_GET['season'];
$name = $_POST['name'];
$pdo = new PDO("mysql:host=localhost;port=3306;charset=UTF8;dbname=todolist", 'root', 'root');

$sql = "INSERT INTO $season (name) VALUES (:name)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->execute();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "season-page.php?season=$season";
header("Location: http://$host$uri/$extra");
exit;
?>
