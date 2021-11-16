<?php
require_once "./database.php";
$conn = connectDB();

$name =  $_POST['name'];
$id = $_GET['id'];

$stmt = $conn->prepare("UPDATE `list` SET name = :name WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);

$stmt->execute();

header("location: ./index.php");

?>