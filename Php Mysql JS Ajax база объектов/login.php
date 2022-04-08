<?php if (isset($_COOKIE['log'])) { header('Location: /main.php'); } ?>

  <?php require 'blocks/header.php'; ?>

	<div class="main">
    <h4>Форма авторизации</h4>
    <form action="" method="post" class="w-50">


      <label for="login">Логин</label>
      <input type="text" name="login" id="login" class="form-control">

      <label for="pass">Пароль</label>
      <input type="password" name="pass" id="pass" class="form-control">

      <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"></div>

      <button type="button" id="auth_user" class="btn btn-success mt-3">
        Войти
      </button>
    </form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$('#auth_user').click(function () {
  var login = $('#login').val();
  var pass = $('#pass').val();

  $.ajax({
    url: 'ajax/auth.php',
    type: 'POST',
    cache: false,
    data: {'login' : login, 'pass' : pass},
    dataType: 'html',
    success: function(data) {
      if (data != 'Готово') {
        $('#errorBlock').show();
        $('#errorBlock').text(data);
      } else {
        $('#auth_user').text('Готово');
        $('#errorBlock').hide();
        document.location.reload(true);
      }
    }
});
});
</script>
</body>
</html>

