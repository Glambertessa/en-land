<div class="header">
    <div class="container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Все курсы</a></div>
            <div class="nav__about"><a class="nav__link" href="/">О нас</a><a class="nav__link" href="/">Бесплатные материалы</a><a class="nav__link" href="/">Новости</a>
            </div>
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
<form class="form-horizontal" name="test_form" id="test_form" method="post" action="/test">
    <div class="container">
        <h1 class="header__title _anim-items">{$test->title}</h1>
        <h2 class="header__about header__test _anim-items">{$test->description}</h2>
        <br>
        <ol>
            {foreach from=$test->questions item=item}
                <li class="test__item">{$item->question}</li>
                {foreach from=$item->answers item=value}
                    <div class="form-check test__radio">
                        <input class="form-check-input" type="radio" name="{$item->id}" id="{$item->id}">
                        <label class="form-check-label" for="{$item->id}">
                            {$value->answer}
                        </label>
                    </div>
                {/foreach}
            {/foreach}
        </ol>
        <a href="test" style="text-decoration: none">
            <div class="button test__button">
                <button type="submit" class="button__inner _anim-items" style="color:null;background:null;fontSize:null;">Посмотреть
                    результат
                    <div class="button__gradient"></div>
                </button>
            </div>
        </a>
    </div>
</form>
<div class="footer">
    <div class="container footer__container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Все курсы</a></div>
            <div class="nav__about"><a class="nav__link" href="/">О нас</a><a class="nav__link" href="/">Бесплатные материалы</a><a class="nav__link" href="/">Новости</a>
            </div>
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