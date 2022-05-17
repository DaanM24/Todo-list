<?php
    require_once "./functions.php";
    $conn = connectDB();

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM items WHERE id=?");
    $stmt->execute([$id]);
    $item = $stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <h1><?= $item[1] ?></h1>
    <p><?= $item[2] ?></p>
    <form method="post" action=<?= './updateItem.php?id='. $item[0]?>>  
        <b>Edit the item</b></br></br>
        Title: <input type="text" name="title" id="title" value="<?= $item[1] ?>">
        </br></br>
        Description: <textarea type="text" name="description" rows="5" cols="40" id="description" value="<?= $item[1] ?>" ></textarea>
        <input type="submit" name="submit" value="Submit"> 
    </form>
</body>
</html>