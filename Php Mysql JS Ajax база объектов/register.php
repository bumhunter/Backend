	<?php require 'blocks/header.php'; ?>
	<div class="main">
    <h4>Форма регистрации</h4>
    <form action="" method="post" class="w-50">
      <label for="username">Ваше имя</label>
      <input type="text" name="username" id="username" class="form-control mb-2">

      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control mb-2">

      <label for="login">Логин</label>
      <input type="text" name="login" id="login" class="form-control mb-2">

      <label for="pass">Пароль</label>
      <input type="password" name="pass" id="pass" class="form-control mb-2">

      <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div>

      <button type="button" id="reg_user" class="btn btn-success mt-3">
        Зарегистрироваться
      </button>
    </form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $('#reg_user').click(function () {
    var name = $('#username').val();
    var email = $('#email').val();
    var login = $('#login').val();
    var pass = $('#pass').val();

    $.ajax({
      url: 'ajax/reg.php',
      type: 'POST',
      cache: false,
      data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
      dataType: 'html',
      success: function(data) {
        if(data == 'Готово') {
          $('.main').html('<h2>Благодарим за регистрацию</h2><br><a class="me-3 py-2 text-dark text-decoration-none" href="/login.php"><b>Войти</b></a>');
        } else {
          $('#errorBlock').attr('style', 'display: block');
          $('#errorBlock').text(data);
        }
      }
    });
  });
</script>
</body>
</html>

