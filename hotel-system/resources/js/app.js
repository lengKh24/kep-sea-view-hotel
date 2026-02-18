import './bootstrap';
import 'flowbite';  
import './salemgt/sale-mgt';
import './room-mgt/room-mgt';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// resources/js/app.js
window.toggleDarkMode = function() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.theme = isDark ? 'dark' : 'light';
}