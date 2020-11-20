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
                            <img src="/resources/landing/images/nav-vk-logo.png" alt="vk-logo">
                        </a></li>
                    <li><a class="menu__item" href="/">WhatsApp
                            <img src="/resources/landing/images/nav-wapp-logo.png" alt="wapp-logo">
                        </a></li>
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
                <button class="button__inner _anim-items __cjax" type="submit" id="test-submit">
                    Посмотреть результат
                    <div class="button__gradient"></div>
                </button>
            </div>
        </a>
    </div>
</form>
<div id="result_container_test" class="result_container_test" style="display: none">
    <div id="result_score" class="result__score"></div>
    <div id="result_title" class="result__title"></div>
    <div id="result_description" class="result__description"></div>
    <div id="result_button" class="button hidden">
        <button class="button__inner _anim-items"
                onClick="openDialog('Записаться', 'ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ', 'Перезвоните мне', 'order')">
            Хочу записаться
            <div class="button__gradient"></div>
        </button>
    </div>
</div>

<div class="modalDialog" style="display:none">
    <div class="modalDialog__inner">
        <p class="modal__title">Заказать</p>
        <p class="social__subtitle">ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ</p>
        <div class="social__block__modal"><img class="icon" src="/resources/landing/images/telegram-brands.png"
                                               alt="telegram"/>
            <img class="icon" src="/resources/landing/images/whatsapp-brands.png" alt="whatsapp"/>
            <img class="icon" src="/resources/landing/images/viber-brands.png" alt="viber"/></div>
        <button class="closeDialog" onClick="closeDialog('modalDialog')">
            <hr/>
            <hr/>
        </button>
        <form>
            <input class="form__input modal__input" id="nameModal" placeholder="Представьтесь, пожалуйста"/>
            <input class="form__input modal__input" id="phoneModal" placeholder="Номер телефона" type="tel"
                   name="phone"/>
            <input class="form__input modal__input" id="emailModal" placeholder="Email" type="email" name="email"/>
        </form>
        <div class="button">
            <button class="button__inner _anim-items modalButton" onClick="callMe(true)">Перезвоните мне
                <div class="button__gradient"></div>
            </button>
        </div>
        <div class="submit__error__modal">Пожалуйста, выберите все поля</div>
    </div>
    <div class="back_drop"></div>
</div>
<div class="modalResponse" style="display:none">
    <div class="modalDialog__inner">
        <p class="modal__title">Спасибо</p>
        <p>Скоро мы с вами свяжемся</p>
        <button class="closeDialog" onClick="closeDialog('modalResponse')">
            <hr>
            <hr>
        </button>
    </div>
    <div class="back_drop"></div>
</div>
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