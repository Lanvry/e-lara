// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function () {
    // ambil path dari URL
    const path = window.location.pathname;

    // cek apakah path mengandung /auth/
    const isAuthPage = path.startsWith("/auth/");

    // inisialisasi AOS
    AOS.init({
        once: isAuthPage ? true : false // jika halaman /auth/* maka sekali, selain itu berulang
    });
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const featureCards = document.querySelectorAll('.feature-card');


    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (event) {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickInsideButton = mobileMenuButton.contains(event.target);

        if (!isClickInsideMenu && !isClickInsideButton && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Feature cards animation

    featureCards.forEach(card => {
        card.addEventListener('mouseenter', function () {
            this.classList.add('shadow-lg');
        });

        card.addEventListener('mouseleave', function () {
            this.classList.remove('shadow-lg');
        });
    });
});