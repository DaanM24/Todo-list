<?php
    require_once "./functions.php";
    $conn = connectDB();

    $id = $_GET['id'];
    $status = $_GET['status'];

    $stmt = $conn->prepare("UPDATE `items` SET status = :status WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':status', $status);

    $stmt->execute();

    header("location: ./index.php");

?>