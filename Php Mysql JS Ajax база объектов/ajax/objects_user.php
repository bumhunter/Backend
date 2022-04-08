<?php

  require '../db.php';

  $db = new Database();

  $results = $db->query('SELECT * FROM objects ORDER BY number');
  foreach ($results as $result) {
    echo "<tr id='$result->number' class='$result->parend_id'>
        <td>$result->number</td>
        <td>$result->title</td>
        <td>$result->description</td>
        <td>

        </td> 
        </tr>";
  }
