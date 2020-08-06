<?php
  include_once("dbConnect.php");
  if(isset($_POST['name']) && isset($_POST['position'])) {
      $id = $_POST['id'];
      $arr = array(
          'name' => $_POST['name'],
          'position' => $_POST['position'],
          );
      foreach($arr as $key => $elem){
          if($elem) {
              $query = "UPDATE `performers` SET `{$key}` = \"{$elem}\" WHERE `id` = \"{$id}\"";
              $result = $conn->query($query);
          }
      }
  }
  include('loadPerformersTable.php');