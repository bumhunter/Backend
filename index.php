<?php if (isset($_COOKIE['log'])) { header('Location: /main.php'); } ?>
	<?php require 'blocks/header.php'; ?>

<div class="container-fluid">



    <h2>Панель пользователя <?=$_COOKIE['log']?></h2><br>

    <h3 class="mb-3"></h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody class="content">

        </tbody>
    </table>
</div>



</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    showList();

    function showList() {
        $.ajax({
            type: "POST",
            url: "ajax/objects_user.php",
            success: function (data) {
                $('.content').html(data);
            }
        });
    }

</script>
</body>
</html>
