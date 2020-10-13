<a href="/" class="back">вернуться на главную</a>
<h1 class="title-center">CodeGen</h1>

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="codegen">
        <div class="form-group">
            <label for="table">Название таблицы:
                <select name="table" id="table" class="form-control" required="required">
                    {foreach from=$tables item=item}
                        <option>{$item->TABLE_NAME}</option>
                    {/foreach}
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="slug">Слаг:</label>
            <input type="text" name="slug" id="slug" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="module">Имя модуля:</label>
            <input type="text" name="module" id="module" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <label for="model">Имя модели:</label>
            <input type="text" name="model" id="model" class="form-control" required="required" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Сгенерировать">
        </div>
    </form>
    <pre class="gen-info">{$info}</pre>
</div>
