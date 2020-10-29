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
      if (animItemHeight > window.innerHeight) {
        animItemPoint = window.innerHeight - window.innerHeight / animStart;
      }
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
    return { top: rect.top + scrollTop, left: rect.left + scrollLeft };
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
var data = {
  phoneNumber: '',
  name: '',
  socialLink: ''
};

function callMe(isModal) {
  if (isModal) {
    if (isFormValid('#nameModal', '#phoneModal') && isSocialBlockActive(socialBlockModal)) {
      validateModal.style.display = 'none';
      var _modalDialog = document.querySelector('.modalDialog');
      _modalDialog.style.display = 'none';
      setData('#phoneModal', '#nameModal', socialBlockModal);
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
    } else {
      validateModal.style.display = 'block';
    }
  } else {
    if (isFormValid(null, '#phone') && isSocialBlockActive(socialBlock)) {
      validate.style.display = 'none';
      setData('#phone', '', socialBlock);
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
    if (block[i].classList.contains('icon__active')) {
      return block[i];
    }
  }
  return false;
};
var isDialogActive = function isDialogActive(nameOfDialog) {
  var dialog = document.querySelector('.' + nameOfDialog);
  if (dialog.style.display === 'none' || dialog.style.display.length === 0) {
    return false;
  }
  return true;
};
var isFormValid = function isFormValid(nameInput, phoneInput) {
  var nameInp = document.querySelector(nameInput);
  var phoneInp = document.querySelector(phoneInput);
  if (nameInput) {
    if (nameInp.value.length > 0 && phoneInp.value.length === 16) {
      return true;
    }
    return false;
  } else {
    if (phoneInp.value.length === 16) {
      return true;
    }
    return false;
  }
};
function openResponseModal() {
  modalResponse.style.display = 'flex';
}
function setData(phoneNumber, name, socialLink) {
  var nameInp = name !== '' ? document.querySelector(name) : '';
  var phoneInp = document.querySelector(phoneNumber);
  var social = isSocialBlockActive(socialLink);
  data = {
    phoneNumber: phoneInp.value,
    name: nameInp.value,
    socialLink: social.alt
  };
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
  body.style.overflow = 'auto';
}
//todo написать функцию на поиск вложенных детей  вместо childNodes[12345].childNodes[12345]
function openDialog(event) {
  var socialBlock = document.querySelectorAll('.social__block__modal > img.icon');
  socialBlock.forEach(function (e) {
    return e.addEventListener('click', function (e, i, arr) {
      return setActiveIcon(e, socialBlock);
    });
  });
  modalDialog.children[0].children[0].textContent = event || 'Записаться';
  modalDialog.style.display = 'flex';
  // console.log(modalDialog.childNodes[1].childNodes);
  modalDialog.childNodes[1].childNodes[11].childNodes[1].style.transform = 'scale(1)';
  modalDialog.childNodes[1].childNodes[11].classList.add('custom__button');
  body.style.overflow = 'hidden';
}
//# sourceMappingURL=script.js.map
function testValidate()
{
  
}