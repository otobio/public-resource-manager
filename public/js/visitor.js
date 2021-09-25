/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/visitor.js ***!
  \*********************************/
function fallbackCopyTextToClipboard(text) {
  var textArea = document.createElement('textarea');
  textArea.value = text;
  textArea.style.top = '0';
  textArea.style.left = '0';
  textArea.style.position = 'fixed';
  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    document.execCommand('copy');
  } catch (err) {}

  document.body.removeChild(textArea);
}

function copyTextToClipboard(text, onDone) {
  if (!navigator.clipboard) {
    fallbackCopyTextToClipboard(text);

    if (typeof onDone === 'function') {
      onDone();
    }

    return;
  }

  navigator.clipboard.writeText(text).then(function () {
    if (typeof onDone === 'function') {
      onDone();
    }
  });
}

$('.copy').tooltip();
document.querySelectorAll('.copy').forEach(function (selector) {
  selector.addEventListener('click', function () {
    copyTextToClipboard(selector.getAttribute('data-copy-text'), function () {
      $(selector).attr('data-original-title', 'copied').tooltip('show');
      setTimeout(function () {
        $(selector).attr('data-original-title', 'click to copy snippet');
      }, 2000);
    });
  });
});
/******/ })()
;