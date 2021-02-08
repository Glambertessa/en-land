<!-- CRM -->
<script data-b24-form="click/8/8ovhjg" data-skip-moving="true">
    (function (w, d, u) {
        var s = d.createElement('script');
        s.async = true;
        s.src = u + '?' + (Date.now() / 180000 | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(window, document, 'https://cdn.bitrix24.ua/b16130923/crm/form/loader_8.js');
</script>
<!-- End of CRM -->

<div class="header">
    <div class="container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Главная</a></div>
            <div class="nav__about">
                <a class="nav__link" href="#advantages">Преимущества</a>
                <a class="nav__link" href="#offer">Предложение</a>
                <a class="nav__link" href="#format">Формат</a>
                <a class="nav__link" href="#about">Описание</a>
                <a class="nav__link" href="#contact">Вопросы</a>
            </div>
            <div class="nav__social">
                {foreach from=$social item=item}
                    <div class="nav__social-item">
                        <a href="{$item->value}" target="_blank">
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
                    {foreach from=$social item=item}
                        <li><a class="menu__item" href="{$item->value}">{$item->key}
                                <img src="/resources/landing/images/{$item->key}.png" alt="{$item->key}">
                            </a></li>
                    {/foreach}
                    <li><a class="menu__item" href="/">Главная</a></li>
                    <li><a class="menu__item" href="#advantages">Преимущества</a></li>
                    <li><a class="menu__item" href="#offer">Предложение</a></li>
                    <li><a class="menu__item" href="#format">Формат</a></li>
                    <li><a class="menu__item" href="#about">Описание</a></li>
                    <li><a class="menu__item" href="#contact">Вопросы</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="header__main-text">
            <h1 class="header__title _anim-items">{$h1}</h1>
            <h2 class="header__about _anim-items">
                Мы не просто обучаем английскому, мы тренеруем
                софт скиллы и развиваем навыки 21 века – критическое
                мышление, креативность, коммуникативность,
                командная работа.
            </h2>
            <div class="header__vacancies">
                <div class="vacancy"><img src="/resources/landing/images/imageVacancy.png"/>
                </div>
            </div>
        </div>
        <div class="header__main-image _anim-items"><img src="/resources/landing/images/header-bg.png" alt=""/></div>
    </div>

    <div class="header__intro _anim-items">
        <div class="button">
            <form action="https://drive.google.com/file/d/1T_J1fNidUejXey3mQIzj1x4XnFMlyINW/view" target="_blank">
                <button class="button__inner _anim-items"
                "
                onClick="openDialog('IT-словарь', 'Заполните пожалуйста форму', 'Получить', 'vocabulary')">Получить
                IT-словарь
                <div class="button__gradient"></div>
                </button>
            </form>
        </div>
        <div class="header__intro-text _anim-items">
            <p>
                С нами вы научитесь свободно общаться с иностранными партнерами, перестанете краснеть
                на переговорах и митингах и будете писать грамотные имейлы.
            </p>
        </div>
    </div>
</div>


<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">

</script>

<div class="button" style="margin-top: 7rem">
    <button id="vidbutton" class="button__inner _anim-items">
        Ознакомительное видео
        <div class="button__gradient"></div>
    </button>
</div>


<div class="container" id="video-block" hidden>
    <img id="loading-gif" src="/resources/img/loading.gif" height="720" style="display: block; margin: auto">
    <video id="video1" controls src="/resources/video/www.mp4"
           style="max-width: 100%; width: 100%; margin-top: 3rem; opacity: 0" hidden preload="auto"></video>
</div>

<script type="text/javascript">
    var is_open = false;

    $('#vidbutton').on('click', function () {


        $('#video-block').slideToggle(200, function () {

            if (false === is_open) {
                $('#loading-gif').css('display', 'none');

                $('#video1').removeAttr('hidden');

                $("#video1").animate({
                    opacity: "+=1",
                }, 1000);

                is_open = true;
            } else {
                $("#video1").animate({
                    opacity: "-=1",
                }, 200);

                $('#loading-gif').css('display', 'block');

                document.getElementById('video1').setAttribute('hidden', null);

                is_open = false;
            }
        });
    });

</script>


<span id="advantage"></span>

<div class="advantages">
    <div class="container">
        <div class="advantages__title _anim-items">
            <h3>Наши преимущества:</h3>
        </div>
        <div class="advantages__about">
            <h4>Aвторская программа обучения, основанная на практическом опыте;</h4>
        </div>
        <div class="advantages__practice _anim-items">
            <div class="advantage" style="background: #d1d7f0">
                <div class="advantage__image"><img src="/resources/landing/images/pract-1.png" alt=""/></div>
                <div class="advantage__main">
                    <div class="advantage__title">
                        <h4>Материалы</h4>
                    </div>
                    <div class="advantage__description">
                        <p>Cовременные материалы, а не устаревшие учебники;</p>
                    </div>
                </div>
            </div>
            <div class="advantage" style="background: #eaf9e6">
                <div class="advantage__image"><img src="/resources/landing/images/pract-2.png" alt=""/></div>
                <div class="advantage__main">
                    <div class="advantage__title">
                        <h4>Урок</h4>
                    </div>
                    <div class="advantage__description">
                        <p>90% на уроке – разговорная практика, 10% - теория;</p>
                    </div>
                </div>
            </div>
            <div class="advantage" style="background: #d1d7f0">
                <div class="advantage__main">
                    <div class="advantage__title">
                        <h4>Методика</h4>
                    </div>
                    <div class="advantage__description">
                        <p>eduSCRUM: обучение проходит спринтами, собственная система трекинга прогресса</p>
                    </div>
                </div>
                <div class="advantage__image"><img src="/resources/landing/images/pract-3.png" alt=""/></div>
            </div>
        </div>
        <div class="button">
            <button class="button__inner _anim-items"
            "
            onClick="openDialog('Записаться', 'ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ', 'Перезвоните мне', 'order')">Хочу
            записаться
            <div class="button__gradient"></div>
            </button>
        </div>
    </div>
</div>

<span id="offer"></span>
<div class="offer">
    <div class="container">
        <div class="offer__heading _anim-items">
            <div class="offer__title">
                <h3>Мы предлагаем</h3>
            </div>
        </div>
        <div class="offer__main">
            <div class="offer__courses">
                <div class="course">
                    <div class="course__heading">
                        <div class="course__image"><img src="/resources/landing/images/star.png" alt=""/></div>
                        <div class="course__title">
                            <h3>General English</h3>
                        </div>
                    </div>
                    <div class="course__description">
                        <p>General English. По итогу курса вы будете свободно говорить на общие темы, разберетесь с
                            грамматикой раз и навсегда, увеличите свой словарный запас, а также избавитесь от
                            психологического барьера. Этот курс подойдет вам, если вы совсем новичок в английском или
                            чувствуете себя не совсем уверенно.</p>
                    </div>
                </div>
                <div class="offer__level">
                    <div class="button">
                        <button class="button__inner _anim-items"
                                onClick="openDialog('Пройти тест', 'пожалуйста, заполните сначала форму', 'Перейти к тесту', 'test')">
                            Узнай свой уровень английского
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                    {*                    <div class="button">*}
                    {*                        <a href="test" style="text-decoration: none">*}
                    {*                        <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;">Узнай свой уровень английского*}
                    {*                            <div class="button__gradient"></div>*}
                    {*                        </button>*}
                    {*                        </a>*}
                    {*                        <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;" onClick="openDialog('Узнать свой уровень английского')">Узнай свой уровень английского*}
                    {*                            <div class="button__gradient"></div>*}
                    {*                        </button>*}
                    {*                    </div>*}
                    <img src="/resources/landing/images/arrow.png" alt=""/>
                </div>
            </div>
            <div class="offer__bonus">
                <div class="course">
                    <div class="course__heading">
                        <div class="course__image"><img src="/resources/landing/images/star.png" alt=""/></div>
                        <div class="course__title">
                            <h3>Communication in IT</h3>
                        </div>
                    </div>
                    <div class="course__description">
                        <p>Communication in IT. По итогу курса вы научитесь обсуждать проекты с заказчиками, общаться с
                            командой на митингах, вести деловую переписку и переговоры, а также проводить презентации на
                            английском. Этот курс подойдет вам, если вы уже владеете английским как минимум на уровне
                            А2.</p>
                    </div>
                </div>
                {*                <div class="offer__visual">*}
                {*                    <h4>Бонус курс</h4><img src="/resources/landing/images/offer-bg.png" alt=""/>*}
                {*                    <h5>UpWork прокачка</h5>*}
                {*                </div>*}
                {*                <div class="offer__description">*}
                {*                    <p>*}
                {*                        По итогу дополнительного бонус курса , вы — профессиональный фрилансер*}
                {*                        с грамотно SEO-оптимизированным профилем Upwork, который привлекает лучших*}
                {*                        клиентов. Вы умеете вести переписку с клиентом на английском. Ваш навык*}
                {*                        написания цепляющих и продающих Cover Letter значительно улучшен, что*}
                {*                        позволяет привлекать заявки на постоянной основе. А так же, мы с вами*}
                {*                        записали отличное видеоинтервью. Вы наслаждаетесь гибким графиком и свободой*}
                {*                        передвижения, стабильно зарабатывая от $1 500/мес и продолжая развиваться,*}
                {*                        работая всего несколько часов в день.*}
                {*                    </p>*}
                {*                </div>*}
            </div>
        </div>
    </div>
</div>

<span id="format"></span>
<div class="format">
    <div class="container">
        <img src="/resources/landing/images/-overlay-slash.png" alt="" id="format__slash-1"/>
        <img src="/resources/landing/images/-overlay-slash.png" alt="" id="format__slash-2"/>
        <img src="/resources/landing/images/-overlay-slash.png" alt="" id="format__slash-3"/>
        <img src="/resources/landing/images/-overlay-pyg-black.png" alt="" id="format__pyg-black-1"/>
        <img src="/resources/landing/images/-overlay-pyg-black.png" alt="" id="format__pyg-black-2"/>
        <div class="format__heading _anim-items">
            <div class="format__title">
                <h3>Выберите удобный формат обучения</h3>
            </div>
        </div>
        {$chunked_courses = array_chunk($courses, 3)}
        {foreach from=$chunked_courses item=$three_courses}
        <div class="format__main">

            {foreach from=$three_courses item=$course}
                <div class="format-pack">
                    <div class="format-pack__card _anim-items">
                        <div class="format-pack__title">
                            <h3>{$course['title']}</h3>
                        </div>
                        <ul class="format-pack__description _anim-items">
                            {$options = explode("\n", $course['options'])}
                            {foreach from=$options item=$option}
                                <li class="list-item">
                                    {$option}
                                </li>
                            {/foreach}
                        </ul>
                        <div class="format-price">
                            <div class="format-price__title">
                                <h3>Стоимость</h3>
                            </div>
                            <div class="format-price__main">
                                <div class="format-price__info">
                                    <p class="format-price__price">{$course['price']} &#8381;</p>
                                    <p class="format-price__places">/ {$course['place_left']}</p>
                                </div>
                                <p class="format-price__howToPay">Оплата частями по рассрочке</p>
                            </div>
                        </div>
                        <div class="button">
                            <button class="button__inner _anim-items"
                                    onClick="openDialog('Записаться', 'ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ', 'Перезвоните мне', 'order')">
                                Хочу записаться
                                <div class="button__gradient"></div>
                            </button>
                        </div>
                    </div>
                </div>
            {/foreach}

        </div>
        {/foreach}
        </div>
    </div>

    <span id="about"></span>
    <div class="about">
        <div class="container">
            <div class="inner">
                <h2 class="title _anim-items">Как это работает:</h2>
                <div class="content_inner _anim-items">
                    <div class="col__left">
                        <div class="item">
                            {*                        <div class="item__header__inner"></div>*}
                            <div class="item__content">
                                <img class="item__icon" src="/resources/landing/images/icon_plus.png"/>
                                <p class="item__title">Проводим диагностику вашего уровня английского</p>
                                <img class="content__image" src="/resources/landing/images/textbook.png"/>
                            </div>
                        </div>
                        <div class="item">
                            {*                        <div class="item__header__inner"></div>*}
                            <div class="item__content">
                                <img class="item__icon" src="/resources/landing/images/icon_plus.png"/>
                                <p class="item__title">Ставим цели и подбираем программу обучения</p>
                                <img class="content__image" src="/resources/landing/images/backlog.png"/>
                            </div>
                        </div>
                    </div>
                    <div class="col__right">
                        <div class="item">
                            {*                        <div class="item__header__inner"></div>*}
                            <div class="item__content">
                                <img class="item__icon" src="/resources/landing/images/icon_plus.png"/>
                                <p class="item__title">Формируем бэклог курса</p>
                                <img class="content__image" src="/resources/landing/images/textbook.png"/>
                            </div>
                        </div>
                        <div class="item">
                            {*                        <div class="item__header__inner"></div>*}
                            <div class="item__content">
                                <img class="item__icon" src="/resources/landing/images/icon_plus.png"/>
                                <p class="item__title">Проводим интересные и полезные уроки</p>
                                <img class="content__image" src="/resources/landing/images/baloons.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="strelkaVniz" src="/resources/landing/images/StrelkaVniz.png"/>
                <div class="item">
                    {*                <div class="item__header__inner additional"></div>*}
                    <div class="item__content">
                        <img class="item__icon" src="/resources/landing/images/icon_plus.png"/>
                        <p class="item__title">Ретроспектива и Final Test</p>
                        <img class="content__image" src="/resources/landing/images/retrospectiva.png"/>
                    </div>
                </div>
                <div class="btn">
                    <div class="button">
                        <button class="button__inner _anim-items"
                                onClick="openDialog('Записаться', 'ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ', 'Перезвоните мне', 'order')">
                            Хочу записаться
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                </div>
                <h2 class="title title__form _anim-items">У Вас еще остались вопросы?</h2>
                <h3 class="subtitle__form">Ввберите удобный способ связи</h3>
                <div class="social__block"><img class="icon" src="/resources/landing/images/telegram-brands.png"
                                                alt="telegram"/>
                    <img class="icon" src="/resources/landing/images/whatsapp-brands.png" alt="whatsapp"/>
                    <img class="icon" src="/resources/landing/images/viber-brands.png" alt="viber"/></div>
                <div class="social__submit"></div>
                <div class="social__btn">
                    <input class="form__input" id="phone" placeholder="+7 (    ) ___-__ - __" type="tel" name="phone"/>
                    <div class="button">
                        <button class="button__inner _anim-items" onClick="callMe()">Перезвоните мне
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                </div>
                <div class="submit__error">Пожалуйста, выберите способ связи и введите номер телефона.</div>
            </div>
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
                <input class="form__input modal__input" id="emailModal" placeholder="E-mail" type="email" name="email"/>
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

    <span id="contact"></span>
    <div class="footer">
        <div class="container footer__container">
            <div class="nav">
                <div class="nav__social">
                    {foreach from=$social item=item}
                        <div class="nav__social-item">
                            <a href="{$item->value}" target="_blank">
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