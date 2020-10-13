{assign var="url" value="{'users/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->username, 'url' => $url])}
<div class="h1">{$model->username}</div>

{core\DetailView::widget()->setParams($model, $options)->run()}