{assign var="url" value="{'/admin/course/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->title, 'url' => $url])}
<div class="h1">{$model->title}</div>

{core\DetailView::widget()->setParams($model, $options)->run()}