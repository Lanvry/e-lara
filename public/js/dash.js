// Toggle sidebar on mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const overlayside = document.getElementById('overlayside');

        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
            overlayside.classList.toggle('active');
        });

        overlay.addEventListener('click', function () {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            notificationPanel.classList.remove('active');
            document.body.style.overflow = 'auto';
            AIPanel.classList.remove('active');
        });
        overlayside.addEventListener('click', function () {
            sidebar.classList.remove('active');
            overlayside.classList.remove('active');
            notificationPanel.classList.remove('active');
        });

        // Notification panel
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationPanel = document.getElementById('notificationPanel');
        const closeNotificationPanel = document.getElementById('closeNotificationPanel');
        const AIBtn = document.getElementById('AIBtn');
        const AIPanel = document.getElementById('AIPanel');
        const closeAIPanel = document.getElementById('closeAIPanel');

        AIBtn.addEventListener('click', function () {
            AIPanel.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = AIPanel.classList.contains('active') ? 'hidden' : 'auto';
        });

        closeAIPanel.addEventListener('click', function () {
            AIPanel.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = AIPanel.classList.contains('active') ? 'hidden' : 'auto';
        });

        notificationBtn.addEventListener('click', function () {
            notificationPanel.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = notificationPanel.classList.contains('active') ? 'hidden' : 'auto';
        });

        closeNotificationPanel.addEventListener('click', function () {
            notificationPanel.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = notificationPanel.classList.contains('active') ? 'hidden' : 'auto';
        });

        // Active menu items
        const menuItems = document.querySelectorAll('.sidebar-menu-link');
        menuItems.forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                // Close sidebar on mobile after selection
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove('active');
                    overlayside.classList.remove('active');
                }
            });
        });

        // Simulate loading for demonstration purposes
        document.addEventListener('DOMContentLoaded', function () {
            // Add loading animation to course buttons
            const courseButtons = document.querySelectorAll('.course-button');
            courseButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const originalText = this.textContent;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat...';

                    setTimeout(() => {
                        this.textContent = originalText;
                    }, 1500);
                });
            });

            // Add functionality to quick action buttons
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const buttonText = this.querySelector('span').textContent;
                    alert(`Membuka halaman: ${buttonText}`);
                });
            });

            // Add functionality to view all links
            const viewAllLinks = document.querySelectorAll('.view-all');
            viewAllLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const sectionTitle = this.closest('.section-header').querySelector('.section-title').textContent;
                    alert(`Melihat semua: ${sectionTitle}`);
                });
            });
        });