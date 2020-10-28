{assign var="url" value="{'test/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->title}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/test/update/{$model->id}">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" class="form-control" value="{$model->title}" required="required" />
        </div>

{*        <div class="form-group">*}
{*            <label for="description">Описание:</label>*}
{*            <input type="text" name="description" id="description" class="form-control" value="{$model->description}"  />*}
{*        </div>*}

        <div class="form-group mt-3">
            <label for="text">Описание:</label>
            {workspace\modules\ckeditor\widgets\CkEditorWidget::widget(['name' => 'description', 'id' => 'text_editor_description', 'text' => {$model->description}])->run()}
            <small id="descriptionMessage"
                   class="form-text">{if isset($errors['description'])}{$errors['description']}{/if}</small>
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <select class="form-control" name="status" id="status">
                {if $model->status eq 1}
                    <option selected value="1">Активный</option>
                {else}
                    <option value="1">Активный</option>
                {/if}
                {if $model->status eq 0}
                    <option selected value="0">Неактивный</option>
                {else}
                    <option value="0">Неактивный</option>
                {/if}
            </select>
        </div>

        <div class="form-group">
            <label for="time">Время на выполнение (в минутах, 0 - если не ограничено):</label>
            <input type="text" name="time" id="time" class="form-control" value="{$model->time}"  />
        </div>

{*        <div class="form-group">*}
{*            <label for="photo">Картинка:</label>*}
{*            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />*}
{*        </div>*}

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>