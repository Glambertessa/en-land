{assign var="url" value="{'test_questions/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post"
          action="/admin/test-questions/update/{$model->id}">
        {*        <div class="form-group">*}
        {*            <label for="test_id">Test_id:</label>*}
        {*            <input type="text" name="test_id" id="test_id" class="form-control" value="{$model->test_id}" required="required" />*}
        {*        </div>*}

        {*        <div class="form-group">*}
        {*            <label for="question_id">Question_id:</label>*}
        {*            <input type="text" name="question_id" id="question_id" class="form-control" value="{$model->question_id}" required="required" />*}
        {*        </div>*}

        <div class="form-group">
            <label for="test_id"></label>
            <select class="form-control" name="test_id" id="test_id">
                {foreach from=$tests item=item}
                    {if $item->id eq $model->test_id}
                        <option selected value="{$item->id}">{$item->title}</option>
                    {else}
                        <option value="{$item->id}">{$item->title}</option>
                    {/if}
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="question_id"></label>
            <select class="form-control" name="question_id" id="question_id">
                {foreach from=$questions item=item}
                    {if $item->id eq $model->questions_id}
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