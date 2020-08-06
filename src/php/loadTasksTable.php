<?php
  include_once('dbConnect.php');
  $query = "SELECT * FROM `tasks`";
  $tasks = $conn->query($query);
  $totalRows = $tasks->num_rows;
  echo "<table class=\"table table-hover table-bordered\">";
  echo "<tr><th scope=\"col\">id</th><th scope=\"col\">Name</th><th scope=\"col\">Performer</th><th scope=\"col\">Status</th><th scope=\"col\">Description</th><th scope=\"col\">Actions</th></tr>";
  if($totalRows < 1) {
      echo "<tr><td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td></tr>";
  }
  else {
    while($row = $tasks->fetch_assoc()) {
      $performer = $conn->query("SELECT `name` FROM `performers` WHERE `id` = \"{$row['performer']}\"")->fetch_assoc();
      $status = $conn->query("SELECT `name` FROM `statuses` WHERE `id` = \"{$row['status']}\"")->fetch_assoc();
      echo "<tr id='tasks{$row['id']}'>";
      echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$performer['name']}</td><td>{$status['name']}</td><td>{$row['description']}</td>";
      echo "<td><div class=\"btn-group btn-group-sm\" role=\"group\"><button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"editTask({$row['id']}, 'tasks')\" id=\"editTaskBtn\">Edit</button>";
      echo "<button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"removeRow({$row['id']}, 'tasks')\" id=\"removeTaskBtn\">Remove</button></div></td>";
      echo "</tr>";
    }
  }
  echo "</table>";