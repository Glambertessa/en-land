{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/test/create">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <input type="text" name="description" id="description" class="form-control"   />
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <input type="text" name="status" id="status" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="time">Время:</label>
            <input type="text" name="time" id="time" class="form-control"   />
        </div>

        <div class="form-group">
            <label for="photo">Картинка:</label>
            <input type="text" name="photo" id="photo" class="form-control"   />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>