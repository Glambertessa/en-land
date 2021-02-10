{assign var="url" value="{'/admin/settings/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->key, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->key}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/keywords/update/{$model->id}">
        <div class="form-group">
            <label for="value">Keyword:</label>
            <input name="value" id="value" class="form-control" required="required" value="{$model->value}"/>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>