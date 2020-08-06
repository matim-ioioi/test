<?php
  include_once("dbConnect.php");
  if(isset($_GET['id']) && isset($_GET['table'])) {
      $id = $_GET['id'];
      $table = $_GET['table'];
      $query = "DELETE FROM `{$table}` WHERE `id` = \"{$id}\"";
      if($res = $conn->query($query)) {
        echo json_encode($_GET['table']);
      }
  }