import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function adjustTextareaHeight(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
  }

  document.addEventListener('input', function(event) {
    if (event.target && event.target.matches('textarea')) {
      adjustTextareaHeight(event.target);
    }
  });

  // Optionally, you can call the adjustTextareaHeight function on page load for existing textarea elements
  document.addEventListener('DOMContentLoaded', function() {
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(function(textarea) {
      adjustTextareaHeight(textarea);
    });
  });