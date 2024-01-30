document.addEventListener('DOMContentLoaded', function() {
    var mobileMenuButton = document.getElementById('mobile-menu-button');
    var mobileMenu = document.querySelector('.mobile-menu ul');

    mobileMenuButton.addEventListener('click', function() {
        if (mobileMenu.style.display === 'block') {
            mobileMenu.style.display = 'none';
        } else {
            mobileMenu.style.display = 'block';
        }
    });
});
