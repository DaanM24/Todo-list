<?php
    $status = array("Finished", "In-Progress", "Unfinished", "");
    require_once "./database.php";
    $conn = connectDB();

    $table = $conn->query("SELECT * FROM items ORDER BY `id`");
    $rows = $table->fetchAll(PDO::FETCH_NUM);

    $table = $conn->query("SELECT * FROM list ORDER BY `id`");
    $lists = $table->fetchAll(PDO::FETCH_NUM);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php
        foreach($lists as $list){ ?>
            <div class="globalList">
                <h1><?= $list[0]. '</br>'. $list[1] ?></h1> 
                <a href=<?= 'editList.php?id='. $list[0]?>>Edit</a>
                <a href=<?= 'deleteList.php?id='. $list[0]?>>Delete</a>
                <p>Filter by</p>
                <div class="dropdown">
                    <button class="dropbtn">Select status</button>
                    <div class="dropdown-content">
                        <a href=<?= 'updateFilter.php?id='. $list[0]. '&status='. $status[0]?>>Finished</a>
                        <a href=<?= 'updateFilter.php?id='. $list[0]. '&status='. $status[1]?>>In Progress</a>
                        <a href=<?= 'updateFilter.php?id='. $list[0]. '&status='. $status[2]?>>Unfinished</a>
                        <a href=<?= 'updateFilter.php?id='. $list[0]. '&status='. $status[3]?>>None</a>
                    </div>
                </div>

                <?php
                    foreach($rows as $row){ 
                        if ($row[3] == $list[0] && $list[2] == $row[4]){ ?>
                            <h2> <?=$row[1] ?> </h2>
                            <p class= "listItem"> <?= $row[2] ?> </p>
                            <div class="dropdown">
                                <button class="dropbtn"><?= $row[4] ?></button>
                                <div class="dropdown-content">
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[0]?>>Finished</a>
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[1]?>>In Progress</a>
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[2]?>>Unfinished</a>
                                </div>
                            </div>
                            <a href=<?= 'editItem.php?id='. $row[0]?>>Edit</a>
                            <a href=<?= 'deleteItem.php?id='. $row[0]?>>Delete</a>
                        <?php }else if($list[2] == null && $row[3] == $list[0]) {?>
                            <h2> <?=$row[1] ?> </h2>
                            <p class= "listItem"> <?= $row[2] ?> </p>
                            <div class="dropdown">
                                <button class="dropbtn"><?= $row[4] ?></button>
                                <div class="dropdown-content">
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[0]?>>Finished</a>
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[1]?>>In Progress</a>
                                    <a href=<?= 'updateStatus.php?id='. $row[0]. '&status='. $status[2]?>>Unfinished</a>
                                </div>
                            </div>
                            <a href=<?= 'editItem.php?id='. $row[0]?>>Edit</a>
                            <a href=<?= 'deleteItem.php?id='. $row[0]?>>Delete</a>

                        <?php } ?>
                    <?php } 
                ?>

                
            </div>
        <?php } ?>
                <div class = "submitForm" id="submitForm">
                    <p>Make your item</p>
                    <form method="post" action="./postItem.php">  
                    Title: <input type="text" name="title" id="title">
                    <br><br>
                    Description: <textarea name="description" rows="5" cols="40" id="description" ></textarea>
                    <br>
                    List: <input list="lists" name="listid" id="listid">
                    <datalist id="lists">
                        <?php foreach($lists as $list){ ?>
                            <option label="<?= $list[1] ?>" value="<?= $list[0]?>">
                        <?php } ?>
                    </datalist>
                    <input type="submit" name="submit" value="Submit"> 
                    </form>
                </div>

                <div class = "submitListForm" id="submitListForm">
                    <p>Make your list</p>
                    <form method="post" action="./postList.php">  
                    Name: <input type="text" name="name" id="name">
                    <input type="submit" name="submit" value="Submit"> 
                    </form>
                </div>
        <button id="submitButton" onclick="showForm()">Create item</button>
        <button id="submitListButton" onclick="showListForm()">Create list</button>

        <script >
            var submitForm = document.getElementById("submitForm");
            submitForm.hidden = true;
            submitListForm.hidden = true;
            function showForm(){
                submitForm.hidden = false;
                submitButton.hidden = true;
            }
            function showListForm(){
                submitListForm.hidden = false;
                submitListButton.hidden = true;
            }
        </script>
</body>
</html>