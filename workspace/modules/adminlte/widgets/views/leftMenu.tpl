<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {foreach from=core\App::$config['adminLeftMenu'] item=title}
            <li class="nav-item {(isset($title['sub'])) ? 'has-treeview' : ''}">
                <a href="{$title['url']}" class="nav-link">
                    {$title['icon']}
                    <p>{$title['title']}</p>
                    {(isset($title['sub'])) ? '<i class="fas fa-angle-left right"></i>' : ''}
                </a>
                {if isset($title['sub'])}
                    <ul class="nav nav-treeview">
                        {foreach from=$title['sub'] item=sub}
                            <li class="nav-item">
                                <a href="{$sub['url']}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{$sub['title']}</p>
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                {/if}
            </li>
        {/foreach}

    </ul>
</nav>