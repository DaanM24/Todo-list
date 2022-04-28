<?php
    require_once "./functions.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM list WHERE id=?");
    $stmt->execute([$id]);
    $list = $stmt->fetch();

    // $stmt = $conn->prepare("SELECT * FROM items WHERE listid=?");
    // $stmt->execute([$listid]);
    // $item = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rick word geupdate vandaag</title>
</head>
<body>
    <h1><?= $list[1] ?></h1>
    <div class = "submitForm">
        <form method="post" action=<?= './updateList.php?id='. $list[0]?>>  
            <b>Edit the list</b></br></br>
            Title: <input type="text" name="name" id="name">
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>
</body>
</html>