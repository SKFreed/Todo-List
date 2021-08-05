<?php
$id= $_GET['id'];
$season = $_GET['season'];
$pdo = new PDO("mysql:host=localhost;port=3306;charset=UTF8;dbname=todolist", 'root', 'root');

$sql = "DELETE FROM $season where id =$id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "season-page.php?season=$season";
header("Location: http://$host$uri/$extra");
exit;
?>
