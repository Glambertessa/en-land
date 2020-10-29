{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/question/create">
        <div class="form-group">
            <label for="question">Вопрос:</label>
            <input type="text" name="question" id="question" class="form-control" required="required"/>
        </div>

        <div class="form-group">
            <label for="status">Статус:</label>
            <select class="form-control" name="status" id="status">
                <option selected value="1">Активный</option>
                <option value="0">Неактивный</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Тип:</label>
            <select class="form-control" name="type" id="type">
                <option value="1">Вопрос с одним ответом</option>
            </select>
        </div>

{*        <div class="form-group">*}
{*            <label for="weight">Вес:</label>*}
{*            <input type="text" name="weight" id="weight" class="form-control"/>*}
{*        </div>*}

        <div class="form-group">
            <label for="point">Балл:</label>
            <input type="text" name="point" id="point" class="form-control" value="1"/>
        </div>

{*        <div class="form-group">*}
{*            <label for="photo">Картинка:</label>*}
{*            <input type="text" name="photo" id="photo" class="form-control"/>*}
{*        </div>*}

        <div class="form-group">
            <label for="test_id"></label>
            <select class="form-control" name="test_id" id="test_id">
                {foreach from=$tests item=item}
                    {if $item->id eq $test_id}
                        <option selected value="{$item->id}">{$item->title}</option>
                    {else}
                        <option value="{$item->id}">{$item->title}</option>
                    {/if}
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сохранить">
        </div>
    </form>
</div>