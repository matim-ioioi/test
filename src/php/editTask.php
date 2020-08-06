<?php
  include_once("dbConnect.php");
  if(isset($_POST['name']) && isset($_POST['performer']) && isset($_POST['status']) && isset($_POST['description'])) {
      $id = $_POST['id'];
      $arr = array(
          'name' => $_POST['name'],
          'performer' => $_POST['performer'],
          'status' => $_POST['status'],
          'description' => $_POST['description']
          );
      foreach($arr as $key => $elem){
          if($elem) {
              $query = "UPDATE `tasks` SET `{$key}` = \"{$elem}\" WHERE `id` = \"{$id}\"";
              $result = $conn->query($query);
          }
      }
  }
  include('loadTasksTable.php');