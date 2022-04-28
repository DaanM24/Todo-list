<?php
    function connectDB(){

    $servername = "localhost";
    $username = "root";
    $password = "mysql";


        $conn = new PDO("mysql:host=$servername;dbname=todolist_db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        return $conn;
    }

    function retrieveItems($listid){
        $conn = connectDB();

        $stmt = $conn->prepare("SELECT * FROM items WHERE `listid` = :listid");
        $stmt->bindParam(':listid', $listid);
        
        $stmt->execute();
        
        $rows = $stmt->fetchAll(PDO::FETCH_NUM);

        $conn = null;
        
        return $rows;
    }

    function retrieveLists(){
        $conn = connectDB();

        $table = $conn->query("SELECT * FROM list ORDER BY `id`");
        $lists = $table->fetchAll(PDO::FETCH_NUM);

        return $lists;
    }

?>