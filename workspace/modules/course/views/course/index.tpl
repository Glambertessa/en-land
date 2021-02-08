<div class="h1">{$h1}</div>

<a href="/admin/course/create" class="btn btn-dark">Создать Курс</a>

{core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($options)->run()])->run()}
