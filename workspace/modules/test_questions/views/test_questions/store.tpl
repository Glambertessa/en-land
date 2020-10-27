{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post"
          action="/admin/test-questions/create">
        {*        <div class="form-group">*}
        {*            <label for="test_id">Test_id:</label>*}
        {*            <input type="text" name="test_id" id="test_id" class="form-control"  required="required" />*}
        {*        </div>*}

        {*        <div class="form-group">*}
        {*            <label for="question_id">Question_id:</label>*}
        {*            <input type="text" name="question_id" id="question_id" class="form-control"  required="required" />*}
        {*        </div>*}

        <div class="form-group">
            <label for="test_id"></label>
            <select class="form-control" name="test_id" id="test_id">
                {foreach from=$tests item=item}
                    <option value="{$item->id}">{$item->title}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="question_id"></label>
            <select class="form-control" name="question_id" id="question_id">
                {foreach from=$questions item=item}
                    <option value="{$item->id}">{$item->question}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>