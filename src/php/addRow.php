<?php
  include_once("dbConnect.php");
  $table = $_POST['table'];
  $data = [];
  $query = "INSERT INTO `{$table}` VALUES (DEFAULT";
  foreach ($_POST as $key => $value) {
    if($key == 'table') continue;
    array_push($data, $value);
  }
  for($i = 0; $i < count($data); $i++) {
    $query = $query.", '".$data[$i]."'";
  }
  $query = $query.")";
  $res = $conn->query($query);

  if($_POST['table'] == 'tasks') include('loadTasksTable.php');
  else include('loadPerformersTable.php');