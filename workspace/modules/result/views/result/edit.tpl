{assign var="url" value="{'result/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/result/update/{$model->id}">
        <div class="form-group">
            <label for="min_score">Min_score:</label>
            <input type="text" name="min_score" id="min_score" class="form-control" value="{$model->min_score}" required="required" />
        </div>

        <div class="form-group">
            <label for="max_score">Max_score:</label>
            <input type="text" name="max_score" id="max_score" class="form-control" value="{$model->max_score}" required="required" />
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{$model->title}" required="required" />
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="{$model->description}"  />
        </div>

{*        <div class="form-group">*}
{*            <label for="photo">Photo:</label>*}
{*            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />*}
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
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>