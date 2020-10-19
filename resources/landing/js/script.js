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
                    animItem.classList.remove('_active');
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
let modalResponse = document.querySelector('.modalResponse');

function callMe(isModal) {
    if (isModal)
        if (isFormValid('#nameModal', '#phoneModal') && isSocialBlockActive(socialBlockModal)) {
            validateModal.style.display = 'none';
            let _modalDialog = document.querySelector('.modalDialog');
            _modalDialog.style.display = 'none';
            openResponseModal();
        } else validateModal.style.display = 'block';
    else
        if (isFormValid(null, '#phone') && isSocialBlockActive(socialBlock)) {
            validate.style.display = 'none';
            openResponseModal();
        } else validate.style.display = 'block';
}

let setActiveIcon = function setActiveIcon(e, block) {
    e.preventDefault();
    block.forEach(function (e) {
        return e.classList.contains('icon__active') ? e.classList.remove('icon__active') : null;
    });
    e.target.classList.add('icon__active');
};

let isSocialBlockActive = function isSocialBlockActive(block) {
    for (var i = 0; i < block.length; i++) {
        if (block[i].classList.contains('icon__active'))
            return true;
    }
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
    modalResponse.style.display = 'flex';
}

let element = document.getElementById('phone');
let maskOptions = {
    mask: '+{7}(000)000-00-00'
};
let mask = IMask(element, maskOptions);
let element1 = document.getElementById('phoneModal');
let mask1 = IMask(element1, maskOptions);
let modalDialog = document.querySelector('.modalDialog');
let body = document.querySelector('body');

function closeDialog(element) {
    let dialog = document.querySelector('.' + element);
    dialog.style.display = 'none';
}

function openDialog(event) {
    let socialBlock = document.querySelectorAll('.social__block__modal > img.icon');
    socialBlock.forEach(function (e) {
        return e.addEventListener('click', function (e, i, arr) {
            return setActiveIcon(e, socialBlock);
        });
    });
    modalDialog.children[0].children[0].textContent = event || 'Записаться';
    modalDialog.style.display = 'flex';
    modalDialog.childNodes[1].childNodes[15].childNodes[1].style.transform = 'scale(1)';
    modalDialog.childNodes[1].childNodes[13].classList.add('custom__button');
    body.style.overflow = 'hidden';
}

function btnOrderPopup() {
    let btn = $("#form-order-popup .btn-order");
    let alertText = $("#form-order-popup .submit__error__modal");
    let radio = $("#form-order-popup .popup_block_apps input");
    let phone = false;
    let user = false;
    let isRadio = false;

    btn.click(function () {
        radio.each(function () {
            if ($(this).prop("checked")) {
                isRadio = true;
                return false;
            }});

        user = $("#form-order-popup .js-userName").val() !== "" && $("#form-order-popup .js-userName").val() !== null;
        phone = $("#form-order-popup .js-phone").val() !== "" && $("#form-order-popup .js-phone").val() !== null;

        if (isRadio === true && user === true && phone === true) {
            let _modalDialog = document.querySelector('.modalDialog');
            _modalDialog.style.display = 'none';
            openResponseModal();

            let social_network = '';
            if($("#pop_whatsApp").prop("checked")) social_network = 'whatsApp';
            else if ($("#pop_telegram").prop("checked")) social_network = 'telegram';
            else if ($("#pop_viber").prop("checked")) social_network = 'viber';

            $.ajax({
                url: '/add-order',
                type: 'POST',
                data: {name: $("#nameModal").val(), phone: $("#phoneModal").val(), social_network: social_network},
                success: function (res) {
                    console.log(res);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        } else
            alertText.css("display", "block");
    });
}

function btnOrderBottom() {
    let btn = $("#form-order .btn-order-bottom");
    let alertText = $("#form-order .submit__error");
    let radio = $("#form-order .popup_block_apps input");

    btn.click(function () {
        let isRadio = false;
        radio.each(function () {
            if ($(this).prop("checked")) {
                isRadio = true;
                return false;
            }});

        if (isRadio === true && $("#form-order .js-phone").val() !== "" && $("#form-order .js-phone").val() !== null) {
            openResponseModal();

            let social_network = '';
            if($("#whatsApp").prop("checked")) social_network = 'whatsApp';
            else if ($("#telegram").prop("checked")) social_network = 'telegram';
            else if ($("#viber").prop("checked")) social_network = 'viber';

            console.log(social_network);

            $.ajax({
                url: '/add-order',
                type: 'POST',
                data: {phone: $("#customer_phone").val(), social_network: social_network},
                success: function (res) {
                    console.log(res);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        } else
            alertText.css("display", "block");
    });
}

$(document).ready(function() {
    btnOrderPopup();
    btnOrderBottom();
});
