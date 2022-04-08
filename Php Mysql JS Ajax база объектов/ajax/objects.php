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
            <div class='btn-group'>
                <button type='button' class='btn btn-primary btn-block add' data-toggle='modal' data-target='#exampleModal' data-whatever='$result->number'>+</button>
                <button class='btn btn-danger btn-block remove'>-</button>
            </div>
        </td> 
        </tr>";
  }
