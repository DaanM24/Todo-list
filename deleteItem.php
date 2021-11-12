<?php
    require_once "./database.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM items WHERE id=?");
    $stmt->execute([$id]);

    header("Location: ./index.php");
?>