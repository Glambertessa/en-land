<h1 class="title-center">Регистрация</h1>

<div class="container custom-container">
    {if !empty($errors)}
        {foreach from=$errors item=error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/foreach}
    {/if}
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/sign-up">
        <div class="form-group">
            <label for="username">Логин:</label>
            <input type="text" name="username" id="username" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <input type="submit" id="submit_button" class="btn btn-dark" value="Зарегестрироваться">
        </div>
    </form>
</div>