<?php
    $status = array("Finished", "In-Progress", "Unfinished", "");
    require "./functions.php";

    $lists = retrieveLists();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="stylesheet" href="assets/style.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        foreach($lists as $list){ ?>
            <div class="globalList">
                <div class="listHeader">
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
                </div>
                

                <?php
                    $rows = retrieveItems($list[0]);
                    foreach($rows as $row){ ?>
                        <div class="task">
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
                        </div>
                        
                     <?php } ?>

                
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