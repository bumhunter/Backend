<?php
  require 'new_object_id.php';
  $newID = new NewID($_POST['title'], $_POST['description'], $_POST['parent_id']);
  $new = $newID->new_id();
  $newID->add_new_object();
  echo "Объект успешно добавлен. Номер: " . $new;





