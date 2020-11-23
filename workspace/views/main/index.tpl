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
            <h1 class="header__title _anim-items">Английский<br/>для IT-специалистов</h1>
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
            <button class="button__inner _anim-items"
            "
            onClick="openDialog('IT-словарь', 'Заполните пожалуйста форму', 'Получить', 'vocabulary')">Получить
            IT-словарь
            <div class="button__gradient"></div>
            </button>
        </div>
        <div class="header__intro-text _anim-items">
            <p>
                С нами вы научитесь свободно общаться с иностранными партнерами, перестанете краснеть
                на переговорах и митингах и будете писать грамотные имейлы.
            </p>
        </div>
    </div>
</div>

<span id="advantages"></span>
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
        <div class="format__main">
            <div class="format-pack"><img class="format-pack__image" src="/resources/landing/images/Ramka.png"/>
                <div class="format-pack__title">
                    <h3>Курс "General":</h3>
                </div>
                {*                <div class="format-pack__subtitle">*}
                {*                    <h4>мини текст должен быть тут</h4>*}
                {*                </div>*}
                <div class="format-pack__description _anim-items">
                    <p class="format-pack__video-collections"></p>
                    <div class="format-pack__video-collection">
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">15 уроков по 1,5 часа на платформе ZOOM;</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">все необходимые учебные материалы</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">чат в Тelegram/WhatsApp с поддержкой ментора 24/7</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">сертификат об окончании курсов</p>
                        </div>
                    </div>
                    {*                    <div class="format-pack__other">*}
                    {*                        <p class="format-pack__other-item">8 домашних заданий</p>*}
                    {*                        <p class="format-pack__other-item">Чат участников марафона</p>*}
                    {*                        <p class="format-pack__other-item">Файлы и помощь наставника!</p>*}
                    {*                        <p class="format-pack__other-item">Самостоятельное прохождение</p>*}
                    {*                    </div>*}
                    <div class="format-price">
                        <div class="format-price__title">
                            <h3>Стоимость</h3>
                        </div>
                        <div class="format-price__main">
                            <div class="format-price__info">
                                <p class="format-price__price">{$standard_price} &#8381;</p>
                                <p class="format-price__places">/ Осталось мест: {$standard_left}</p>
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
            <div class="format-pack"><img class="format-pack__image" src="/resources/landing/images/Ramka.png"/>
                <div class="format-pack__title">
                    <h3>Курс "Communication in IT"</h3>
                </div>
                {*                <div class="format-pack__subtitle">*}
                {*                    <h4>мини текст должен быть тут</h4>*}
                {*                </div>*}
                <div class="format-pack__description _anim-items">
                    {*                    <p class="format-pack__video-collections">3 видеоколлекции на темы:</p>*}
                    <div class="format-pack__video-collection">
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">15 уроков по 1,5 часа на платформе ZOOM</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">все необходимые учебные материалы</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">чат в Тelegram/WhatsApp с поддержкой ментора 24/7</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">сертификат об окончании курсов</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">индивидуальный план развития ваших навыков на будущее</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text"> карьерное консультирование (вместе составим сильное CV и
                                научимся проходить job interview)</p>
                        </div>
                    </div>
                    {*                    <div class="format-pack__other">*}
                    {*                        <p class="format-pack__other-item">8 домашних заданий</p>*}
                    {*                        <p class="format-pack__other-item">Чат участников марафона</p>*}
                    {*                        <p class="format-pack__other-item">3 разбора в формате live + проверка всех домашних заданий тренером</p>*}
                    {*                        <p class="format-pack__other-item">Файлы и помощь наставника!</p>*}
                    {*                        <p class="format-pack__other-item">Самостоятельное прохождение</p>*}
                    {*                        <p class="format-pack__other-item">Полноценный индивидуальный план развития на будущее с учётом всех твоих слабых сторон</p>*}
                    {*                    </div>*}
                    <div class="format-price">
                        <div class="format-price__title">
                            <h3>Стоимость</h3>
                        </div>
                        <div class="format-price__main">
                            <div class="format-price__info">
                                <p class="format-price__price">{$advanced_price} &#8381;</p>
                                <p class="format-price__places">/ Осталось мест: {$advanced_left}</p>
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
            <div class="format-pack"><img class="format-pack__image" src="/resources/landing/images/Ramka.png"/>
                <div class="format-pack__title">
                    <h3>Индивидуальное занятие:</h3>
                </div>
                <div class="format-pack__description _anim-items">
                    <div class="format-pack__video-collection">
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">гибкий график занятий: занимайся английским в любое удобное для
                                тебя время</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">комфортный темп занятий: не нужно ждать отстающих одногруппников,
                                можно тщательнее проработать свои ошибки и т.д.</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text"> кастомизированный бэклог уроков: выбирайте темы для обсуждения,
                                которые интересны тебе!</p>
                        </div>
                    </div>
                </div>
                <div class="format-pack__description _anim-items">
                    <div class="format-price">
                        <div class="format-price__title">
                            <h3>Стоимость</h3>
                        </div>
                        <div class="format-price__main">
                            <div class="format-price__info">
                                <p class="format-price__price">{$individual_price}&nbsp;&#8381;</p>
                                <p class="format-price__places">/ Одно занятие</p>
                            </div>
                            <p class="format-price__howToPay"></p>
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
        </div>
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
    </div>
</div>