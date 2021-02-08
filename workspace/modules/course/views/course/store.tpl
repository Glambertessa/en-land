{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
<div class="h1">{$h1}</div>

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/course/create">
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" class="form-control" required="required"/>
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" name="price" id="price" class="form-control" />
        </div>
        <div class="form-group">
            <label for="place_left">Подпись рядом с ценой:</label>
            <input type="text" name="place_left" id="place_left" class="form-control" />
        </div>
        <div class="form-group">
            <label for="options">Условия:</label>
            <textarea rows="7" name="options" id="options" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>