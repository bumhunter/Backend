<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>



<style>
    .inner {
        display: none;
    }

</style>

<div class="container py-3">
<header>
	<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
		<a href="/" class="d-flex align-items-center text-dark text-decoration-none">
			<span class="fs-4">ТЕСТОВОЕ ЗАДАНИЕ. ДЕРЕВО ОБЪЕКТОВ</span>
		</a>
		<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
			<?php if (isset($_COOKIE['log'])): ?>
				<a class="me-3 py-2 text-dark text-decoration-none" href="#"><?=$_COOKIE['log']?></a>
				<a class="me-3 py-2 text-dark text-decoration-none" href="/logout.php"><b>Выйти</b></a>
            <?php else: ?>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/register.php">Регистрация</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="/login.php">Вход</a>
			<?php endif; ?>
		</nav>
	</div>
	<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	</div>
</header>