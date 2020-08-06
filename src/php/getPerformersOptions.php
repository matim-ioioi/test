<?php 
  include('dbConnect.php');
  $query = "SELECT * FROM `performers`";
  $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
      echo "<option value='{$row['id']}'>{$row['name']}</option>";
  }