<?php
  include_once('dbConnect.php');
  $query = "SELECT * FROM `performers`";
  $performers = $conn->query($query);
  $totalRows = $performers->num_rows;
  echo "<table class=\"table table-hover table-bordered\" id=\"performersTable\">";
  echo "<tr><th scope=\"col\">id</th><th scope=\"col\">Name</th><th scope=\"col\">Position</th><th scope=\"col\">Actions</th></tr>";
  if($totalRows < 1) {
      echo "<tr><td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td>";
      echo "<td> No Data: DataBase Empty </td></tr>";
  }
  else {
    while($row = $performers->fetch_assoc()) {
      echo "<tr id='performers{$row['id']}'>";
      echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['position']}</td>";
      echo "<td><div class=\"btn-group btn-group-sm\" role=\"group\"><button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"editPerformer({$row['id']}, 'performers')\" id=\"editPerformersBtn\">Edit</button>";
      echo "<button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"removeRow({$row['id']}, 'performers')\" id=\"removePerformersBtn\">Remove</button></div></td>";
      echo "</tr>";
    }
  }
  echo "</table>";