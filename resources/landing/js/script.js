'use strict';

var animItems = document.querySelectorAll('._anim-items');

if (animItems.length > 0) {
    var animOnScroll = function animOnScroll(params) {
        for (var index = 0; index < animItems.length; index++) {
            var animItem = animItems[index];
            var animItemHeight = animItem.offsetHeight;
            var animItemOffset = offset(animItem).top;
            var animStart = 4;
            var animItemPoint = window.innerHeight - animItemHeight / animStart;
            if (animItemHeight > window.innerHeight)
                animItemPoint = window.innerHeight - window.innerHeight / animStart;

            if (pageYOffset > animItemOffset - animItemPoint && pageYOffset < animItemOffset + animItemHeight) {
                animItem.classList.add('_active');
            } else {
                if (!animItem.classList.contains('_anim-once')) {
                    animItem.classList.remove('_active');
                }
            }
        }
    };

    window.addEventListener('scroll', animOnScroll);

    var offset = function offset(el) {
        var rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        return {top: rect.top + scrollTop, left: rect.left + scrollLeft};
    };
    setTimeout(function () {
        return animOnScroll();
    }, 300);
}

var socialBlock = document.querySelectorAll('.social__block > img.icon');
socialBlock.forEach(function (e) {
    return e.addEventListener('click', function (e, i, arr) {
        return setActiveIcon(e, socialBlock);
    });
});
var socialBlockModal = document.querySelectorAll('.social__block__modal > img.icon');
socialBlockModal.forEach(function (e) {
    return e.addEventListener('click', function (e, i, arr) {
        return setActiveIcon(e, socialBlockModal);
    });
});
var validate = document.querySelector('.submit__error');
var validateModal = document.querySelector('.submit__error__modal');
var modalResponse = document.querySelector('.modalResponse');

function callMe(isModal) {
    if (isModal) {
        if (isFormValid('#nameModal', '#phoneModal') && isSocialBlockActive(socialBlockModal)) {
            validateModal.style.display = 'none';
            var _modalDialog = document.querySelector('.modalDialog');
            _modalDialog.style.display = 'none';
            openResponseModal();
        } else {
            validateModal.style.display = 'block';
        }
    } else {
        if (isFormValid(null, '#phone') && isSocialBlockActive(socialBlock)) {
            validate.style.display = 'none';
            openResponseModal();
        } else {
            validate.style.display = 'block';
        }
    }
}

var setActiveIcon = function setActiveIcon(e, block) {
    e.preventDefault();
    block.forEach(function (e) {
        return e.classList.contains('icon__active') ? e.classList.remove('icon__active') : null;
    });
    e.target.classList.add('icon__active');
};

var isSocialBlockActive = function isSocialBlockActive(block) {
    for (var i = 0; i < block.length; i++) {
        if (block[i].classList.contains('icon__active'))
            return true;
    }
    return false;
};
var isDialogActive = function isDialogActive(nameOfDialog) {
    var dialog = document.querySelector('.' + nameOfDialog);
    if (dialog.style.display === 'none' || dialog.style.display.length === 0)
        return false;
    return true;
};
var isFormValid = function isFormValid(nameInput, phoneInput) {
    var nameInp = document.querySelector(nameInput);
    var phoneInp = document.querySelector(phoneInput);
    if (nameInput) {
        if (nameInp.value.length > 0 && phoneInp.value.length === 16)
            return true;
        return false;
    } else {
        if (phoneInp.value.length === 16)
            return true;
        return false;
    }
};

function openResponseModal() {
    modalResponse.style.display = 'flex';
}

var element = document.getElementById('phone');
var maskOptions = {
    mask: '+{7}(000)000-00-00'
};
var mask = IMask(element, maskOptions);
var element1 = document.getElementById('phoneModal');
var mask1 = IMask(element1, maskOptions);
var modalDialog = document.querySelector('.modalDialog');
var body = document.querySelector('body');

function closeDialog(element) {
    var dialog = document.querySelector('.' + element);
    dialog.style.display = 'none';
}

function openDialog(event) {
    var socialBlock = document.querySelectorAll('.social__block__modal > img.icon');
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



// function btnOrderPopup() {
//     var btn = $("#form-order-popup .btn-order");
//     var alertText = $("#form-order-popup .js-alert");
//     var radio = $("#form-order-popup .popup_block_apps input");
//     var phone = false;
//     var user = false;
//     var isRadio = false;
//     btn.click(function () {
//         ym(67610002,'reachGoal','order');
//         gtag('event', 'order', { 'event_category': 'form', 'event_action': 'order', });
//
//         radio.each(function () {
//             if ($(this).prop("checked")) {
//                 isRadio = true;
//                 return false;
//             }
//         });
//
//         //Проверка юзернейма
//         if ($("#form-order-popup .js-userName").val() != "" && $("#form-order-popup .js-userName").val() != null) {
//             user = true;
//         } else {
//             user = false;
//         }
//
//         //Проверка телефона
//         if ($("#form-order-popup .js-phone").val() != "" && $("#form-order-popup .js-phone").val() != null) {
//             phone = true;
//         } else {
//             phone = false;
//         }
//
//         if (isRadio == true && user == true && phone == true) {
//             alertText.css("display", "none");
//             $('.js-popup-order').removeClass('open');
//             popupThankOpen();
//
//             let social_network = '';
//             if($("#pop_whatsApp").prop("checked"))
//                 social_network = 'whatsApp';
//             else if ($("#pop_telegram").prop("checked"))
//                 social_network = 'telegram';
//             else if ($("#pop_viber").prop("checked"))
//                 social_network = 'viber';
//
//             console.log($("#nameModal").val());
//
//             // $.ajax({
//             //     url: '/add-order',
//             //     type: 'POST',
//             //     data: {name: $("#nameModal").val(), phone: $("#phoneModal").val(), social_network: social_network},
//             //     success: function () {
//             //     },
//             //     error: function () {
//             //     }
//             // });
//         } else {
//             alertText.css("display", "block");
//         }
//     });
// }
//
$(document).ready(function() {
    $(document).on('click', '.modal_submit', function (e) {
        e.preventDefault();
        let name = $("#nameModal");
        console.log(name);
    });
});
