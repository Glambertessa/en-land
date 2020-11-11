{assign var="url" value="{'test/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => $url])}
<div class="h1">{$model->title}</div>

<a href="/admin/test/update/{$model->id}" class="btn btn-dark">Редактировать</a>
{core\DetailView::widget()->setParams($model, $options)->run()}

<div class="h2">Результаты</div>
<a href="/admin/result/create?test_id={$model->id}" class="btn btn-dark">Создать</a>
{core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($results_options)->run()])->run()}

<div class="h2">Добавить вопрос</div>
<a href="/admin/question/create?test_id={$model->id}" class="btn btn-dark">Создать</a>
{core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($questions_options)->run()])->run()}