{assign var="url" value="{'question/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => $url])}
<div class="h1">{$model->question}</div>

{core\DetailView::widget()->setParams($model, $options)->run()}

<div class="h2">Добавить ответ</div>
<a href="/admin/answer/create?question_id={$model->id}" class="btn btn-dark">Создать</a>
{core\Cjax::widget(['id' => 'cjax', 'data' => core\GridView::widget($answers_options)->run()])->run()}