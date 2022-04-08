<?php
if(!isset($_COOKIE['log'])) { header('/index.php'); };
require 'blocks/header.php'; ?>

<div style="z-index: 3;" class="d-flex justify-content-center position-fixed w-100 align-bottom text-light">
    <div id="notice" style="width: 400px; display: none;" class="mt-5 bg-danger border border-3 rounded p-5 text-center">

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новый объект</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="object-title" class="col-form-label">Наименование:</label>
                        <input type="text" class="form-control" id="object-title">
                    </div>
                    <div class="form-group">
                        <label for="object-description" class="col-form-label">Подробное описание:</label>
                        <textarea class="form-control" id="object-description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary new-obj">Добавить</button>
            </div>
        </div>
    </div>
</div>

  <div class="container-fluid">



    <h2>Панель администратора. <?=$_COOKIE['log']?></h2><br>

    <h3 class="mb-3">Редактирование структуры данных:</h3>
      <button type='button' class='btn btn-primary btn-block add my-2' data-toggle='modal' data-target='#exampleModal' data-whatever=''>Добавить новый раздел</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    showList();

    function showList() {
        $.ajax({
            type: "POST",
            url: "ajax/objects.php",
            success: function (data) {
                $('.content').html(data);
            }
        });
    }

    $('body').on('click', '.remove', function(e) {
        let id = $(this).parent().parent().parent().attr('id');
        $.ajax({
            url: 'ajax/delete_object.php',
            type: 'POST',
            cache: false,
            data: { 'id': id },
            dataType: 'html',
            success: function(data) {
                showList();
            }
        });
    });

    $('body').on('click', '.new-obj', function(e) {
        let parent_id = $(this).attr('id');
        let title = $('#object-title').val();
        let description = $('#object-description').val();
        $.ajax({
            url: 'ajax/add_object.php',
            type: 'POST',
            cache: false,
            data: { 'parent_id': parent_id,
                    'title': title,
                    'description': description },
            dataType: 'html',
            success: function(data) {
                $('#object-title').val("");
                $('#object-description').val("");
                setTimeout(function() {
                    $('#exampleModal').modal('hide');
                    $("#notice").html(data);
                    $("#notice").fadeToggle('slow');
                    setTimeout(function() { $("#notice").fadeToggle('slow'); }, 5500);
                }, 1500);
                showList();
            }
        });
    });


</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
</script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let object = button.data('whatever');
        let modal = $(this);
        if (object === "") {
            modal.find('.modal-title').text('Новый объект: ');
            modal.find('.new-obj').attr('id', 0);
        } else {
            modal.find('.modal-title').text('Новый объект для ' + object);
            modal.find('.new-obj').attr('id', object);
        }

     })
</script>
</body>
</html>