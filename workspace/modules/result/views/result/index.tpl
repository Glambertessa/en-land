<div class="h1">{$h1}</div>
<a href="/admin/result/create" class="btn btn-dark">Создать</a>
{core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($options)->run()])->run()}