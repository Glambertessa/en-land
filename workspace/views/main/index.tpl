<div class="header">
    <div class="container">
        <div class="nav">
            <div class="nav__main"><a class="nav__link" href="/">Все курсы</a></div>
            <div class="nav__about">
                <a class="nav__link" href="/">О нас</a>
                <a class="nav__link" href="/">Бесплатные материалы</a>
                <a class="nav__link" href="/">Новости</a>
            </div>
            <div class="nav__social">
                {foreach from=$social item=item}
                    <div class="nav__social-item">
                        <a href="{$item->value}">
                            <img class="nav__social-logo" src="/resources/landing/img/{$item->key}.png"
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
                    <li>
                        <a class="menu__item" href="/">ВК
                            <image src="assets/images/nav-vk-logo.png" alt=""></image>
                        </a>
                    </li>
                    <li>
                        <a class="menu__item" href="/">WhatsApp
                            <image src="assets/images/nav-wapp-logo.png" alt=""></image>
                        </a>
                    </li>
                    <li><a class="menu__item" href="/">О нас</a></li>
                    <li><a class="menu__item" href="/">Бесплатные материалы</a></li>
                    <li><a class="menu__item" href="/">Новости</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="header__main-text">
            <h1 class="header__title _anim-items">Английский<br/>для IT-специалистов</h1>
            <h2 class="header__about _anim-items">
                Мы не просто обучаем английскому, мы тренеруем
                софт скиллы и развиваемнавыки 21 века – критическое
                мышление, креативность, коммуникативность,
                командная работа.
            </h2>
            <div class="header__vacancies">
                <div class="vacancy"><img src="/resources/landing/img/imageVacancy.png" alt=""/>
                </div>
            </div>
        </div>
        <div class="header__main-image _anim-items"><img src="/resources/landing/img/header-bg.png" alt=""/></div>
    </div>
    <div class="header__intro _anim-items">
        <div class="button">
            <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;"
                    onClick="openDialog('Смотреть вступительный урок')">Смотреть вступительный урок
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
                <div class="advantage__image"><img src="/resources/landing/img/pract-1.png" alt=""/></div>
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
                <div class="advantage__image"><img src="/resources/landing/img/pract-2.png" alt=""/></div>
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
                <div class="advantage__image"><img src="/resources/landing/img/pract-3.png" alt=""/></div>
            </div>
        </div>
        <div class="button">
            <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;"
                    onClick="openDialog()">Хочу записаться
                <div class="button__gradient"></div>
            </button>
        </div>
    </div>
</div>
<div class="offer">
    <div class="container">
        <div class="offer__heading _anim-items">
            <div class="offer__title">
                <h3>Мы предлагаем</h3>
            </div>
            <div class="offer__about">
                <p>elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                <p>elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exerciam,</p>
                <p>quis nostrud exerci</p>
            </div>
        </div>
        <div class="offer__main">
            <div class="offer__courses">
                <div class="course">
                    <div class="course__heading">
                        <div class="course__image"><img src="/resources/landing/img/star.png" alt=""/></div>
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
                <div class="course">
                    <div class="course__heading">
                        <div class="course__image"><img src="/resources/landing/img/star.png" alt=""/></div>
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
                <div class="offer__level">
                    <div class="button">
                        <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;"
                                onClick="openDialog('Узнать свой уровень английского')">Узнай свой уровень английского
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                    <img src="/resources/landing/img/arrow.png" alt=""/>
                </div>
            </div>
            <div class="offer__bonus">
                <div class="offer__visual">
                    <h4>Бонус курс</h4><img src="/resources/landing/img/offer-bg.png" alt=""/>
                    <h5>UpWork прокачка</h5>
                </div>
                <div class="offer__description">
                    <p>
                        По итогу дополнительного бонус курса , вы — профессиональный фрилансер
                        с грамотно SEO-оптимизированным профилем Upwork, который привлекает лучших
                        клиентов. Вы умеете вести переписку с клиентом на английском. Ваш навык
                        написания цепляющих и продающих Cover Letter значительно улучшен, что
                        позволяет привлекать заявки на постоянной основе. А так же, мы с вами
                        записали отличное видеоинтервью. Вы наслаждаетесь гибким графиком и свободой
                        передвижения, стабильно зарабатывая от $1 500/мес и продолжая развиваться,
                        работая всего несколько часов в день.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="format">
    <div class="container"><img src="/resources/landing/img/-overlay-slash.png" alt="" id="format__slash-1"/><img
                src="/resources/landing/img/-overlay-slash.png" alt="" id="format__slash-2"/><img
                src="/resources/landing/img/-overlay-slash.png" alt="" id="format__slash-3"/><img
                src="/resources/landing/img/-overlay-pyg-black.png" alt="" id="format__pyg-black-1"/><img
                src="/resources/landing/img/-overlay-pyg-black.png" alt="" id="format__pyg-black-2"/>
        <div class="format__heading _anim-items">
            <div class="format__title">
                <h3>Выберите удобный формат обучения</h3>
            </div>
            <div class="format__about">
                <p>elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni</p>
                <p>elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exerciam,</p>
                <p>quis nostrud exerci</p>
            </div>
        </div>
        <div class="format__main">
            <div class="format-pack"><img class="format-pack__image" src="/resources/landing/img/Ramka.png" alt=""/>
                <div class="format-pack__title">
                    <h3>Пакет Стандарт</h3>
                </div>
                <div class="format-pack__subtitle">
                    <h4>мини текст должен быть тут</h4>
                </div>
                <div class="format-pack__description _anim-items">
                    <p class="format-pack__video-collections">3 видеоколлекции на темы:</p>
                    <div class="format-pack__video-collection">
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Из чего состоит кейс (структура), критерии успешного кейса</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Страхи: я не смогу заработать, мои работы никому не понравятся, я
                                облажаюсь. Как раз и навсегда их побороть</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Публикация, продвижение кейса и переупаковка его для других
                                соцсетей. Нюансы и лайфхаки.</p>
                        </div>
                    </div>
                    <div class="format-pack__other">
                        <p class="format-pack__other-item">8 домашних заданий</p>
                        <p class="format-pack__other-item">Чат участников марафона</p>
                        <p class="format-pack__other-item">Файлы и помощь наставника!</p>
                        <p class="format-pack__other-item">Самостоятельное прохождение</p>
                    </div>
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
                        <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;"
                                onClick="openDialog()">Хочу записаться
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="format-pack"><img class="format-pack__image" src="/resources/landing/img/Ramka.png" alt=""/>
                <div class="format-pack__title">
                    <h3>Пакет Продвинутый</h3>
                </div>
                <div class="format-pack__subtitle">
                    <h4>мини текст должен быть тут</h4>
                </div>
                <div class="format-pack__description _anim-items">
                    <p class="format-pack__video-collections">3 видеоколлекции на темы:</p>
                    <div class="format-pack__video-collection">
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Из чего состоит кейс (структура), критерии успешного кейса</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Страхи: я не смогу заработать, мои работы никому не понравятся, я
                                облажаюсь. Как раз и навсегда их побороть</p>
                        </div>
                        <div class="list-item">
                            <div class="list-item__circle-wrapper">
                                <div class="list-item__circle small"></div>
                            </div>
                            <p class="list-item__text">Публикация, продвижение кейса и переупаковка его для других
                                соцсетей. Нюансы и лайфхаки.</p>
                        </div>
                    </div>
                    <div class="format-pack__other">
                        <p class="format-pack__other-item">8 домашних заданий</p>
                        <p class="format-pack__other-item">Чат участников марафона</p>
                        <p class="format-pack__other-item">3 разбора в формате live + проверка всех домашних заданий
                            тренером</p>
                        <p class="format-pack__other-item">Файлы и помощь наставника!</p>
                        <p class="format-pack__other-item">Самостоятельное прохождение</p>
                        <p class="format-pack__other-item">Полноценный индивидуальный план развития на будущее с учётом
                            всех твоих слабых сторон</p>
                    </div>
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
                        <button class="button__inner _anim-items" style="color:null;background:null;fontSize:null;"
                                onClick="openDialog()">Хочу записаться
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about">
    <div class="container">
        <form class="inner">
            <h2 class="title _anim-items">Как это работает:</h2>
            <h3 class="subtitle _anim-items">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et d iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris </h3>
            <div class="content_inner _anim-items">
                <div class="col__left">
                    <div class="item">
                        <div class="item__header__inner"><img class="item__icon"
                                                              src="/resources/landing/img/icon_plus.png" alt=""/>
                            <p class="item__title">Проводим диагностику вашего уровня английского.</p>
                        </div>
                        <div class="item__content">
                            <p class="item__text">Наше тестирование оценивает ваши знания не только в области английской
                                грамматики, но и в таких важных аспектах языка как словарный запас, чтение и восприятие
                                речи на слух.</p><img class="content__image" src="/resources/landing/img/textbook.png"
                                                      alt=""/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__header__inner"><img class="item__icon"
                                                              src="/resources/landing/img/icon_plus.png" alt=""/>
                            <p class="item__title">Проводим диагностику вашего уровня английского.</p>
                        </div>
                        <div class="item__content">
                            <p class="item__text">Наше тестирование оценивает ваши знания не только в области английской
                                грамматики, но и в таких важных аспектах языка как словарный запас, чтение и восприятие
                                речи на слух.</p><img class="content__image" src="/resources/landing/img/backlog.png"
                                                      alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col__right">
                    <div class="item">
                        <div class="item__header__inner"><img class="item__icon"
                                                              src="/resources/landing/img/icon_plus.png" alt=""/>
                            <p class="item__title">Проводим диагностику вашего уровня английского.</p>
                        </div>
                        <div class="item__content">
                            <p class="item__text">Наше тестирование оценивает ваши знания не только в области английской
                                грамматики, но и в таких важных аспектах языка как словарный запас, чтение и восприятие
                                речи на слух.</p><img class="content__image" src="/resources/landing/img/textbook.png"
                                                      alt=""/>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item__header__inner"><img class="item__icon"
                                                              src="/resources/landing/img/icon_plus.png" alt=""/>
                            <p class="item__title">Проводим диагностику вашего уровня английского.</p>
                        </div>
                        <div class="item__content">
                            <p class="item__text">Наше тестирование оценивает ваши знания не только в области английской
                                грамматики, но и в таких важных аспектах языка как словарный запас, чтение и восприятие
                                речи на слух.</p><img class="content__image" src="/resources/landing/img/baloons.png"
                                                      alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <img class="strelkaVniz" src="/resources/landing/img/StrelkaVniz.png"/>
            <div class="item">
                <div class="item__header__inner additional">
                    <img class="item__icon" src="/resources/landing/img/icon_plus.png" alt=""/>
                    <p class="item__title">Проводим диагностику вашего уровня английского.</p>
                </div>
                <div class="item__content">
                    <p class="item__text">Наше тестирование оценивает ваши знания не только в области английской
                        грамматики, но и в таких важных аспектах языка как словарный запас, чтение и восприятие речи на
                        слух.</p><img class="content__image" src="/resources/landing/img/retrospectiva.png" alt=""/>
                </div>
            </div>
            <div class="btn">
                <div class="button">
                    <button class="button__inner _anim-items"
                            style="color:null;background:null;fontSize:null;"
                            onClick="openDialog()">Хочу записаться
                        <div class="button__gradient"></div>
                    </button>
                </div>
            </div>
            <h2 class="title title__form _anim-items">У Вас еще остались вопросы?</h2>
            <h3 class="subtitle__form">Ввберите удобный способ связи</h3>
<!-- --------------------------------------------------------------------------------------------------- -->
            <form id="form-order" name="order" method="post" action="add-order">
                {*                <div class="social__block">*}
                {*                    <img class="icon" src="/resources/landing/img/telegram-brands.png" alt="Не поддерживает браузер"/>*}
                {*                    <img class="icon" src="/resources/landing/img/whatsapp-brands.png" alt="Не поддерживает браузер"/>*}
                {*                    <img class="icon" src="/resources/landing/img/viber-brands.png" alt="Не поддерживает браузер"/>*}
                {*                </div>*}
                {*                <div class="social__submit"></div>*}

                <div class="popup_block_apps">
                    <input type="radio" id="pop_telegram" name="social_network" class="social_network" value="telegram"
                           required="required">
                    <label for="pop_telegram">
                        <img src="/resources/landing/img/telegram-brands.png" alt="">
                    </label>

                    <input type="radio" id="pop_whatsApp" name="social_network" class="social_network" value="whatsApp"
                           required="required">
                    <label for="pop_whatsApp">
                        <img src="/resources/landing/img/whatsapp-brands.png" alt="">
                    </label>

                    <input type="radio" id="pop_viber" name="social_network" class="social_network" value="viber"
                           required="required">
                    <label for="pop_viber">
                        <img src="/resources/landing/img/viber-brands.png" alt="">
                    </label>
                </div>

                <div class="social__btn">
                    <input class="form__input" id="customer_phone" placeholder="+7 (    ) ___-__ - __" type="tel"
                           name="phone"/>
                    <div class="button">
                        <button type="button" class="btn-order-bottom"
                                {*                            style="color:null;background:null;fontSize:null;" onClick="callMe()"*}
                        >
                            Перезвоните мне
                            <div class="button__gradient"></div>
                        </button>
                    </div>
                </div>
                <div class="submit__error">Пожалуйста, выберите способ связи и введите номер телефона.</div>
            </form>
    </div>
</div>
</div>
<!-- --------------------------------------------------------------------------------------------------------------- -->
<div class="modalDialog" style="display:none">
    <div class="modalDialog__inner">
        <p class="modal__title">Заказать</p>
        <p class="social__subtitle">ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ</p>
        <form id="form-order-popup" method="post" action="add-order">
            <button class="closeDialog" onClick="closeDialog('modalDialog')">
                <hr/>
                <hr/>
            </button>
            {*            <div class="social__block__modal">*}
            {*                <img class="icon social" data-id="telegram" src="/resources/landing/img/telegram-brands.png" alt=""/>*}
            {*                <img class="icon social" data-id="whatsapp" src="/resources/landing/img/whatsapp-brands.png" alt=""/>*}
            {*                <img class="icon social" data-id="viber" src="/resources/landing/img/viber-brands.png" alt=""/>*}
            {*            </div>*}

            <div class="popup_block_apps">
                <input type="radio" id="pop_telegram" name="social_network" class="social_network" value="telegram"
                       required="required">
                <label for="pop_telegram">
                    <img src="/resources/landing/img/telegram-brands.png" alt="">
                </label>

                <input type="radio" id="pop_whatsApp" name="social_network" class="social_network" value="whatsApp"
                       required="required">
                <label for="pop_whatsApp">
                    <img src="/resources/landing/img/whatsapp-brands.png" alt="">
                </label>

                <input type="radio" id="pop_viber" name="social_network" class="social_network" value="viber"
                       required="required">
                <label for="pop_viber">
                    <img src="/resources/landing/img/viber-brands.png" alt="">
                </label>
            </div>

            <input class="form__input modal__input js-userName" id="nameModal" name="name"
                   placeholder="Представьтесь, пожалуйста"/>
            <input class="form__input modal__input js-phone" id="phoneModal" name="phone" placeholder="Номер телефона"
                   type="tel"/>

            <div class="button">
                <button type="button" id="modal_submit" class="button__inner _anim-items btn-order"
                        {*                        style="color:null;background:null;fontSize:null;" onClick="callMe(true)"*}
                >
                    Перезвоните мне
                    <div class="button__gradient"></div>
                </button>
            </div>
            <div class="submit__error__modal">Пожалуйста, выберите все поля</div>
        </form>

        <div class="back_drop"></div>
    </div>
    <!-- --------------------------------------------------------------------------------------------------------------- -->
    <div class="modalResponse" style="display:none">
        <div class="modalDialog__inner">
            <p class="modal__title">Спасибо</p>
            <p>Скоро мы с вами свяжемся</p>
            <button class="closeDialog" onClick="closeDialog('modalResponse')">
                <hr/>
                <hr/>
            </button>
        </div>
        <div class="back_drop"></div>
    </div>
    <div class="footer">
        <div class="container footer__container">
            <div class="nav">
                <div class="nav__main">
                    <a class="nav__link" href="/">Все курсы</a>
                </div>
                <div class="nav__about">
                    <a class="nav__link" href="/">О нас</a>
                    <a class="nav__link" href="/">Бесплатные материалы</a>
                    <a class="nav__link" href="/">Новости</a>
                </div>
                <div class="nav__social">
                    {foreach from=$social item=item}
                        <div class="nav__social-item">
                            <a href="{$item->value}">
                                <img class="nav__social-logo" src="/resources/landing/img/{$item->key}.png"
                                     alt="{$item->key}">
                                <span class="nav__social-title">Написать в {$item->key}</span>
                            </a>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>