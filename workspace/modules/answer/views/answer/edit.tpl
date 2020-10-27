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
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="{$model->status}" required="required" />
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" class="form-control" value="{$model->type}" required="required" />
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="text" name="weight" id="weight" class="form-control" value="{$model->weight}"  />
        </div>

        <div class="form-group">
            <label for="point">Point:</label>
            <input type="text" name="point" id="point" class="form-control" value="{$model->point}"  />
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />
        </div>

        <div class="form-group">
            <label for="question_id">Question_id:</label>
            <input type="text" name="question_id" id="question_id" class="form-control" value="{$model->question_id}" required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>