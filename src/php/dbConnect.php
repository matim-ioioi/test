<?php
    $conn = mysqli_connect("localhost", "root", "") or die("No connection: ".mysqli_error($conn));
    $dbName = "testex";
    mysqli_select_db($conn, $dbName) or die("No database selected: ".mysqli_error($conn));