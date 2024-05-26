document.addEventListener('DOMContentLoaded', () => {
    const menu = document.getElementById('side-menu');
    const button = document.getElementById('menu-toggle');
    button.addEventListener('click', () => {
        menu.classList.toggle('open');
    });
});
