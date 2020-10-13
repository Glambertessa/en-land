<a href="/" class="back">вернуться на главную</a>
<div class="module-action">
    <h2 class="title-center ">Менеджер модулей</h2>
    <div class="content-center"><a href="/update-manifest" class="btn btn-dark">Подтянуть локальные модули</a></div>

    {core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($options)->run()])->run()}
    <br>
</div>