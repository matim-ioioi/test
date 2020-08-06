<?php
    include_once("dbConnect.php");
    if(isset($_GET['id']) && isset($_GET['table'])) {
        $id = $_GET['id'];
        $table = $_GET['table'];
        $query = "SELECT * FROM `{$table}` WHERE `id` = \"{$id}\"";
        $res = $conn->query($query);
        echo json_encode($res->fetch_assoc());
    }