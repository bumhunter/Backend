<?php

  require '../db.php';

  $db = new Database();

  $id = $_POST['id'];

  $results = $db->query("DELETE FROM objects WHERE number LIKE CONCAT(?, '%')", [$id]);

  echo $id;
