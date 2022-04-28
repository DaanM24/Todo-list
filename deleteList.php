<?php
    require_once "./functions.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM list WHERE id=?");
    $stmt->execute([$id]);

    $listid = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM items WHERE listid=?");
    $stmt->execute([$id]);

    header("Location: ./index.php");
?>