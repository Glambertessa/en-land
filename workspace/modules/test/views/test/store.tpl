{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/test/create">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" class="form-control"  required="required" />
        </div>

        <div class="form-group mt-3">
            <label for="text">Описание:</label>
            {workspace\modules\ckeditor\widgets\CkEditorWidget::widget(['name' => 'description', 'id' => 'text_editor_description'])->run()}
            <small id="descriptionMessage"
                   class="form-text">{if isset($errors['description'])}{$errors['description']}{/if}</small>
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <select class="form-control" name="status" id="status">
                    <option selected value="1">Активный</option>
                    <option value="0">Неактивный</option>
            </select>
        </div>

        <div class="form-group">
            <label for="time">Время на выполнение (в минутах, 0 - если не ограничено):</label>
            <input type="text" name="time" id="time" class="form-control" value="0" />
        </div>

{*        <div class="form-group">*}
{*            <label for="photo">Картинка:</label>*}
{*            <input type="text" name="photo" id="photo" class="form-control"   />*}
{*        </div>*}


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>