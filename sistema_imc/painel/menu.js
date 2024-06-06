document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon');
    const menuContainer = document.querySelector('.menu-container');
    const closeMenuIcon = document.querySelector('.close-menu-icon');
    
    function toggleMenu() {
        menuContainer.classList.toggle('open');
    }
    
    function closeMenu() {
        menuContainer.classList.remove('open');
    }

    menuIcon.addEventListener('click', toggleMenu);

    closeMenuIcon.addEventListener('click', closeMenu);

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            closeMenu();
            if (!menuContainer.parentNode) {
                document.body.appendChild(menuContainer);
            }
        } else {
            if (menuContainer.parentNode) {
                document.body.removeChild(menuContainer);
            }
        }
    });
});