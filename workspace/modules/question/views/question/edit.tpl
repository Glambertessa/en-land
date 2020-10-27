{assign var="url" value="{'question/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->question}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/question/update/{$model->id}">
        <div class="form-group">
            <label for="question">Вопрос:</label>
            <input type="text" name="question" id="question" class="form-control" value="{$model->question}" required="required" />
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <input type="text" name="status" id="status" class="form-control" value="{$model->status}" required="required" />
        </div>

        <div class="form-group">
            <label for="type">Тип:</label>
            <input type="text" name="type" id="type" class="form-control" value="{$model->type}" required="required" />
        </div>

        <div class="form-group">
            <label for="weight">Вес:</label>
            <input type="text" name="weight" id="weight" class="form-control" value="{$model->weight}"  />
        </div>

        <div class="form-group">
            <label for="point">Баллы:</label>
            <input type="text" name="point" id="point" class="form-control" value="{$model->point}"  />
        </div>

        <div class="form-group">
            <label for="photo">Картинка:</label>
            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />
        </div>

        <div class="form-group">
            <label for="test_id"></label>
            <select class="form-control" name="test_id" id="test_id">
                {foreach from=$tests item=item}
                    <option value="{$item->id}">{$item->title}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>