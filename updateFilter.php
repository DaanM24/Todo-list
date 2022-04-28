<?php
    require_once "./functions.php";
    $conn = connectDB();

    $id = $_GET['id'];
    $filter = $_GET['status'];

    $stmt = $conn->prepare("UPDATE `list` SET filter = :filter WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':filter', $filter);

    $stmt->execute();

    header("location: ./index.php");

?>