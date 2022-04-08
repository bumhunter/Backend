<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if(strlen($username) <= 3)
	$error = 'Введите имя';
else if(strlen($email) <= 3)
	$error = 'Введите email';
else if(strlen($login) <= 3)
	$error = 'Введите логин';
else if(strlen($pass) <= 3)
	$error = 'Введите пароль';

if($error != '') {
	echo $error;
	exit();
}

$pass = md5($pass);

require '../db.php';
$db = new Database();
$db->query("INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)", [$username, $email, $login, $pass]);

echo 'Готово';
