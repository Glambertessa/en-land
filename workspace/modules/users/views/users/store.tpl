{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/users/create">
        <div class="form-group">
            <label for="username">Логин:</label>
            <input type="text" name="username" id="username" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="role">Роль:</label>
            <input type="text" name="role" id="role" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>