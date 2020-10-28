{assign var="url" value="{'answer/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/answer/update/{$model->id}">
        <div class="form-group">
            <label for="answer">Answer:</label>
            <input type="text" name="answer" id="answer" class="form-control" value="{$model->answer}" required="required" />
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
            <label for="type">Тип:</label>
            <select class="form-control" name="type" id="type">
                {if $model->type eq 0}
                    <option selected value="0">Неправильный ответ</option>
                {else}
                    <option value="0">Неправильный ответ</option>
                {/if}
                {if $model->type eq 1}
                    <option selected value="1">Правильный ответ</option>
                {else}
                    <option value="1">Правильный ответ</option>
                {/if}
            </select>
        </div>


{*        <div class="form-group">*}
{*            <label for="weight">Weight:</label>*}
{*            <input type="text" name="weight" id="weight" class="form-control" value="{$model->weight}"  />*}
{*        </div>*}

        <div class="form-group">
            <label for="point">Баллы:</label>
            <input type="text" name="point" id="point" class="form-control" value="{$model->point}"  />
        </div>

{*        <div class="form-group">*}
{*            <label for="photo">Photo:</label>*}
{*            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />*}
{*        </div>*}
{*        *}
        <div class="form-group">
            <label for="question_id"></label>
            <select class="form-control" name="question_id" id="question_id">
                {foreach from=$questions item=item}
                    {if $item->id eq $model->question_id}
                        <option selected value="{$item->id}">{$item->question}</option>
                    {else}
                        <option value="{$item->id}">{$item->question}</option>
                    {/if}
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>