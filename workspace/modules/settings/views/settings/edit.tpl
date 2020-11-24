{assign var="url" value="{'/admin/settings/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->key, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->key}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/settings/update/{$model->id}">
        <div class="form-group">
            <label for="key">Key:</label>
            <input type="text" name="key" id="key" class="form-control" required="required" value="{$model->key}" />
        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <textarea rows="7" name="value" id="value" class="form-control" required="required">{$model->value}</textarea>
        </div>
        <div class="form-group">
            <label for="label">Категория:</label>
            <input type="text" name="label" id="label" class="form-control" value="{$model->label}" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>