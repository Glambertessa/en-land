<html>
{include file="{$workspace_dir}/modules/adminlte/assets/resources.tpl"}
<head>
    {$smarty.capture.meta}
    <title>{$title}</title>
    {$meta}
    {$smarty.capture.css}
    {$smarty.capture.js_head}
    {$jsHead}
</head>
<body>

<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        {workspace\modules\adminlte\widgets\TopMenu::widget()->run()}

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <div class="container brand-text font-weight-light>">{core\App::$config['app_name']}</div>
            <div class=" container admin-info">Hi, {workspace\modules\users\models\User::getCurrentUserName()}!</div>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{*                <div class="image">*}
{*                    <img src="/workspace/modules/adminlte/resources/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">*}
{*                </div>*}
                <div class="container">

                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
            {workspace\modules\adminlte\widgets\LeftMenu::widget()->run()}
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                {core\BreadCrumbs::widget()->run()}
                {$content}
            </div>
        </section>
    </div>

    <footer class="main-footer">
    </footer>
</div>

{$smarty.capture.js_body}
{$jsEndBody}
</body>
</html>