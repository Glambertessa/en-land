<div class="header">
    <div class="container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Вернуться на главную</a></div>
            <div class="nav__social">
                {foreach from=$social item=item}
                    <div class="nav__social-item">
                        <a href="{$item->value}">
                            <img class="nav__social-logo" src="/resources/landing/images/{$item->key}.png"
                                 alt="{$item->key}">
                            <span class="nav__social-title">Написать в {$item->key}</span>
                        </a>
                    </div>
                {/foreach}
            </div>
        </div>
        <div class="burger burger_menu">
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox"/>
                <label class="menu__btn" for="menu__toggle"><span></span></label>
                <ul class="menu__box">
                    <li><a class="menu__item" href="/">ВК
                            <image src="/resources/landing/images/nav-vk-logo.png"></image></a></li>
                    <li><a class="menu__item" href="/">WhatsApp
                            <image src="/resources/landing/images/nav-wapp-logo.png"></image></a></li>
                    <li><a class="menu__item" href="/">О нас</a></li>
                    <li><a class="menu__item" href="/">Бесплатные материалы</a></li>
                    <li><a class="menu__item" href="/">Новости</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<form class="form-horizontal" name="test_form" id="test_form" method="post">
    <div class="container">
        <h1 class="header__title _anim-items">{$test->title}</h1>
        <h2 class="header__about header__test _anim-items">{$test->description}</h2>
        <br>
        <ol>
            {foreach from=$test->questions item=item}
                <li class="test__item">{$item->question}
                {foreach from=$item->answers item=value}
                    <div class="form-check test__radio">
                        <label class="form-check-label" for="{$item->id}">
                            <input class="form-check-input" type="radio" name="{$item->id}"
                                   required="required" value="{$value->id}">
                            <span id="{$item->id}-{$value->id}">{$value->answer}</span>
                        </label>
                    </div>
                {/foreach}
                </li>
            {/foreach}
        </ol>
        <input type="text" name="test" id="test" class="hidden" required="required" value="{$test->id}"/>
        <a href="test" style="text-decoration: none">
            <div class="button test__button">
                <button class="button__inner _anim-items __cjax" type="submit" id="test-submit" style="color:null;background:null;fontSize:null;">Посмотреть
                    результат
                    <div class="button__gradient"></div>
                </button>
            </div>
        </a>
    </div>
</form>

<div id="result_score" class="result__score"></div>
<div id="result_title" class="result__title"></div>
<div id="result_description" class="result__description"></div>
<div id="result_button"></div>

<div class="footer">
    <div class="container footer__container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Вернуться на главную</a></div>
            <div class="nav__social">
                {foreach from=$social item=item}
                    <div class="nav__social-item">
                        <a href="{$item->value}">
                            <img class="nav__social-logo" src="/resources/landing/images/{$item->key}.png"
                                 alt="{$item->key}">
                            <span class="nav__social-title">Написать в {$item->key}</span>
                        </a>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>