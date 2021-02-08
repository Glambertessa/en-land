{assign var="url" value="{'/admin/course/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->title, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->title}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/course/update/{$model->id}">
        <div class="form-group">
            <label for="title">Название:</label>
            <textarea rows="7" name="title" id="title" class="form-control" required="required">{$model->title}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" name="price" id="price" class="form-control" value="{$model->price}" />
        </div>
        <div class="form-group">
            <label for="place_left">Подпись рядом с ценой:</label>
            <input type="text" name="place_left" id="place_left" class="form-control" value="{$model->place_left}" />
        </div>
        <div class="form-group">
            <label for="options">Условия:</label>
            <textarea rows="7" name="options" id="options" class="form-control" >{$model->options}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>