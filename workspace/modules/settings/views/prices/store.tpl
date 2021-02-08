{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
<div class="h1">{$h1}</div>

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/prices/create">
        <div class="form-group">
            <label for="key">Key:</label>
            <input type="text" name="key" id="key" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <textarea rows="7" name="value" id="value" class="form-control" required="required"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>