<?php
  $pass = md5($_POST['pass']);

	require '../db.php';
	$db = new Database();
	$user = $db->query("SELECT `login` FROM `users` WHERE `login` = ?", [$_POST['login']]);
	foreach ($user as $item) {
		$result = $item->login;
	}
	if (!isset($result)) {
		echo "Пользователь не найден";
	} else {
		setcookie('log', $result, time() + 3600 * 48, "/");
		echo "Готово";
	}

