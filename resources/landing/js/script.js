'use strict';

let animItems = document.querySelectorAll('._anim-items');

if (animItems.length > 0) {
    let animOnScroll = function animOnScroll(params) {
        for (let index = 0; index < animItems.length; index++) {
            let animItem = animItems[index];
            let animItemHeight = animItem.offsetHeight;
            let animItemOffset = offset(animItem).top;
            let animStart = 4;
            let animItemPoint = window.innerHeight - animItemHeight / animStart;

            if (animItemHeight > window.innerHeight)
                animItemPoint = window.innerHeight - window.innerHeight / animStart;

            if (pageYOffset > animItemOffset - animItemPoint && pageYOffset < animItemOffset + animItemHeight)
                animItem.classList.add('_active');
            else if (!animItem.classList.contains('_anim-once'))

                console.log();
            let animFlagBreak = true;
            //animItem.classList.remove('_active');
        }
    };

    window.addEventListener('scroll', animOnScroll);

    let offset = function offset(el) {
        let rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        return {top: rect.top + scrollTop, left: rect.left + scrollLeft};
    };
    setTimeout(function () {
        return animOnScroll();
    }, 300);
}

let socialBlock = document.querySelectorAll('.social__block > img.icon');
socialBlock.forEach(function (e) {
    return e.addEventListener('click', function (e, i, arr) {
        return setActiveIcon(e, socialBlock);
    });
});
let socialBlockModal = document.querySelectorAll('.social__block__modal > img.icon');
socialBlockModal.forEach(function (e) {

    return e.addEventListener('click', function (e, i, arr) {
        return setActiveIcon(e, socialBlockModal);
    });
});
let validate = document.querySelector('.submit__error');
let validateModal = document.querySelector('.submit__error__modal');

let data = {
    phoneNumber: '',
    name: '',
    socialLink: ''
};

function callMe() {
    let isModal = document.querySelector('[data-type]').getAttribute('data-type');
    let body = document.querySelector('body');
    if (isModal) {
        if (isFormValid('#nameModal', '#phoneModal') && isSocialBlockActive(socialBlockModal)) {
            validateModal.style.display = 'none';
            let _modalDialog = document.querySelector('.modalDialog');
            _modalDialog.style.display = 'none';
            setData('#phoneModal', '#nameModal', socialBlockModal, '#emailModal');
            if (isModal === 'order')
                openResponseModal();

            $.ajax({
                url: '/add-order',
                type: 'POST',
                data: {data: JSON.stringify(data)},
                success: function () {

                    if (isModal === 'vocabulary') {
                        let link = document.createElement('a');
                        link.setAttribute('href', 'http://en-land.loc/resources/pdf/it_vocabulary.pdf');
                        link.setAttribute('download', 'download');
                        link.click();
                        body.style.overflow = 'auto';
                    } else if (isModal === 'test')
                        location.href = 'http://en-land.loc/test';
                },
                error: function () {
                }
            });
        } else
            validateModal.style.display = 'block';
    } else {
        if (isFormValid(null, '#phone') && isSocialBlockActive(socialBlock)) {
            validate.style.display = 'none';
            setData('#phone', '', socialBlock, '');
            openResponseModal();
            $.ajax({
                url: '/add-order',
                type: 'POST',
                data: {data: JSON.stringify(data)},
                success: function () {
                },
                error: function () {
                }
            });
        } else
            validate.style.display = 'block';
    }
}

let setActiveIcon = function setActiveIcon(e, block) {
    e.preventDefault();
    block.forEach(function (e) {
        return e.classList.contains('icon__active') ? e.classList.remove('icon__active') : null;
    });
    e.target.classList.add('icon__active');
};

let isSocialBlockActive = function isSocialBlockActive(block) {
    for (let i = 0; i < block.length; i++)
        if (block[i].classList.contains('icon__active'))
            return block[i];

    return false;
};
let isDialogActive = function isDialogActive(nameOfDialog) {
    let dialog = document.querySelector('.' + nameOfDialog);
    return !(dialog.style.display === 'none' || dialog.style.display.length === 0);

};
let isFormValid = function isFormValid(nameInput, phoneInput) {
    let nameInp = document.querySelector(nameInput);
    let phoneInp = document.querySelector(phoneInput);
    if (nameInput)
        return nameInp.value.length > 0 && phoneInp.value.length === 16;
    else
        return phoneInp.value.length === 16;
};

function openResponseModal() {
    let modalResponse = document.querySelector('.modalResponse');
    console.log(modalResponse);
    modalResponse.style.display = 'flex';
}

function setData(phoneNumber, name, socialLink, email) {
    let nameInp = name !== '' ? document.querySelector(name) : '';
    let phoneInp = document.querySelector(phoneNumber);
    let emailInp = document.querySelector(email);
    let social = isSocialBlockActive(socialLink);
    data = {
        phoneNumber: phoneInp.value,
        name: nameInp.value,
        socialLink: social.alt,
        email: emailInp.value
    };
}

let element = document.getElementById('phone');
let maskOptions = {
    mask: '+{7}(000)000-00-00'
};

let mask = IMask(element, maskOptions);
let element1 = document.getElementById('phoneModal');
let mask1 = IMask(element1, maskOptions);

function closeDialog(element) {
    let body = document.querySelector('body');
    let dialog = document.querySelector('.' + element);
    dialog.style.display = 'none';
    body.style.overflow = 'auto';
}

function openDialog(title, description, button_text, type) {
    let socialBlock = document.querySelectorAll('.social__block__modal > img.icon');
    let modalDialog = document.querySelector('.modalDialog');
    let body = document.querySelector('body');
    socialBlock.forEach(function (e) {
        return e.addEventListener('click', function (e) {
            return setActiveIcon(e, socialBlock);
        });
    });

    modalDialog.children[0].children[0].textContent = title || 'Записаться';
    modalDialog.children[0].children[1].textContent = description || 'ВЫБЕРИТЕ УДОБНЫЙ СПОСОБ СВЯЗИ';
    modalDialog.style.display = 'flex';

    modalDialog.querySelector('.modalButton').textContent = button_text || 'Перезвоните мне';
    modalDialog.querySelector('.modalButton').setAttribute('data-type', type);

    modalDialog.childNodes[1].childNodes[11].childNodes[1].style.transform = 'scale(1)';
    modalDialog.childNodes[1].childNodes[11].classList.add('custom__button');
    body.style.overflow = 'hidden';
}