{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/answer/create">
        <div class="form-group">
            <label for="answer">Answer:</label>
            <input type="text" name="answer" id="answer" class="form-control" required="required"/>
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
                <option selected value="0">Неправильный ответ</option>
                <option value="1">Правильный ответ</option>
            </select>
        </div>

        {*        <div class="form-group">*}
        {*            <label for="weight">Weight:</label>*}
        {*            <input type="text" name="weight" id="weight" class="form-control"   />*}
        {*        </div>*}

        <div class="form-group">
            <label for="point">Баллы:</label>
            <input type="text" name="point" id="point" class="form-control" value="0"/>
        </div>

        {*        <div class="form-group">*}
        {*            <label for="photo">Photo:</label>*}
        {*            <input type="text" name="photo" id="photo" class="form-control"   />*}
        {*        </div>*}

        {*        <div class="form-group">*}
        {*            <label for="question_id">Question_id:</label>*}
        {*            <input type="text" name="question_id" id="question_id" class="form-control"  required="required" />*}
        {*        </div>*}

        <div class="form-group">
            <label for="question_id"></label>
            <select class="form-control" name="question_id" id="question_id">
                {foreach from=$questions item=item}
                    {if $item->id eq $question_id}
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