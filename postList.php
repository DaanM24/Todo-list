<?php
    require_once "./database.php";
    $conn = connectDB();

    $name =  $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO list (name)
    VALUES (:name)");
    $stmt->bindParam(':name', $name);


    $stmt->execute();

    $conn = null;

    header("Location: ./index.php");

?>