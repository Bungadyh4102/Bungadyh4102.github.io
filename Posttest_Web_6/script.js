document.addEventListener('DOMContentLoaded', function() {

    const popUpBox = document.getElementById('popUpBox');
    const closeBtn = document.querySelector('.close');

    popUpBox.style.display = 'block';

    closeBtn.addEventListener('click', function() {
        popUpBox.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === popUpBox) {
            popUpBox.style.display = 'none';
        }
    });

    const themeButton = document.getElementById('themeButton');
    const body = document.body;

    themeButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
        themeButton.textContent = body.classList.contains('dark-mode') ? '🌙' : '🌞';
    });

    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const navLinks = document.querySelector('.nav-links');

    hamburgerMenu.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

}); 