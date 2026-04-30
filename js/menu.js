function toggleMenu() {
    var menu = document.querySelector('.menu ul');
    menu.classList.toggle('active');

    var closeIcon = document.querySelector('.menu .close-icon');
    closeIcon.style.display = (menu.classList.contains('active')) ? 'block' : 'none';
}





