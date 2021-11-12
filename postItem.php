<?php
    require_once "./database.php";
    $conn = connectDB();

    $title =  $_POST['title'];
    $description = $_POST['description'];
    $listid = $_POST['listid'];

    $stmt = $conn->prepare("INSERT INTO items (title, description, listid)
    VALUES (:title, :description, :listid)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':listid', $listid);

    $stmt->execute();

    $conn = null;


    header("Location: ./index.php");

?>