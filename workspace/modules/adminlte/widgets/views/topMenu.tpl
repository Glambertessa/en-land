<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    {foreach from=core\App::$config['adminTopMenu'] item=value}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{$value['url']}" class="nav-link">
                {$value['title']}
            </a>
        </li>
    {/foreach}
</ul>