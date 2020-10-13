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

// let IMask = require('imask')
// let element = document.getElementById('phone');
// let maskOptions = {
//   mask: '+7(000)000-00-00',
//   lazy: false
// };
// let mask = IMask(element, maskOptions);
// // mask.value = '+7 (    ) ___-__ - __'

var socialBlock = document.querySelectorAll('.icon');
console.log(socialBlock);
socialBlock.forEach(function (e) {
  return e.addEventListener('click', function (e, i, arr) {
    return setActiveIcon(e);
  });
});
function callMe() {
  var result = void 0;
  for (var i = 0; i < socialBlock.length; i++) {
    if (socialBlock[i].classList.contains('icon__active')) {
      result = socialBlock[i];
      return;
    }
    {
      console.log(result, 'callMe');
      break;
    }
  }

  // let socialBlock = document.querySelector('.social__block')
}

var setActiveIcon = function setActiveIcon(e) {
  e.preventDefault();
  socialBlock.forEach(function (e) {
    return e.classList.contains('icon__active') ? e.classList.remove('icon__active') : null;
  });
  e.target.parentNode.classList.add('icon__active');
};

function test() {
  console.log('hi');
}

var element = document.getElementById('phone');
var maskOptions = {
  mask: '+{7}(000)000-00-00'
};
var mask = IMask(element, maskOptions);
var element = document.getElementById('phoneModal');
var maskOptions = {
  mask: '+{7}(000)000-00-00'
};
var mask = IMask(element, maskOptions);
var modalDialog = document.querySelector('.modalDialog');
var body = document.querySelector('body');
function closeDialog() {
  modalDialog.style.display = 'none';
  body.style.overflow = 'auto';
}
//todo написать функцию на поиск вложенных детей  вместо childNodes[12345].childNodes[12345]
function openDialog(event) {
  console.log(modalDialog.childNodes[1].childNodes);
  modalDialog.children[0].children[0].textContent = event || 'Записаться';
  modalDialog.style.display = 'flex';
  modalDialog.childNodes[1].childNodes[13].childNodes[1].style.transform = 'scale(1)';
  modalDialog.childNodes[1].childNodes[13].classList.add('custom__button');
  body.style.overflow = 'hidden';
}
//# sourceMappingURL=script.js.map
