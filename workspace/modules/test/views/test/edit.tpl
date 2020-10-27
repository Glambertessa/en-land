{assign var="url" value="{'test/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/test/update/{$model->id}">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" class="form-control" value="{$model->title}" required="required" />
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <input type="text" name="description" id="description" class="form-control" value="{$model->description}"  />
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <input type="text" name="status" id="status" class="form-control" value="{$model->status}" required="required" />
        </div>

        <div class="form-group">
            <label for="time">Время:</label>
            <input type="text" name="time" id="time" class="form-control" value="{$model->time}"  />
        </div>

        <div class="form-group">
            <label for="photo">Картинка:</label>
            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>