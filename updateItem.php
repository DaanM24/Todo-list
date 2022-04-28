<?php
    require_once "./functions.php";
    $conn = connectDB();
    
    $title =  $_POST['title'];
    $description = $_POST['description'];
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE `items` SET title = :title,  description = :description WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);

    $stmt->execute();

    header("location: ./index.php");
?>