@component("components.layout")

@section('body-class', '')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    @endpush
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">EC</div>
                <div class="sidebar-brand">Edu<span>Campus</span></div>
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-book"></i>
                        <span>Kursus</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-tasks"></i>
                        <span>Tugas</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-calendar"></i>
                        <span>Jadwal</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-comments"></i>
                        <span>Pesan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="#" class="sidebar-menu-link">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">JD</div>
                    <div class="user-details">
                        <div class="user-name">John Doe</div>
                        <div class="user-role">Mahasiswa</div>
                    </div>
                </div>
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </aside>

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>

        <!-- Notification Panel -->
        <div class="notification-panel" id="notificationPanel">
            <div class="panel-header">
                <h3 class="panel-title">Notifikasi</h3>
                <button class="close-panel" id="closeNotificationPanel">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="notification-content">
                <p>Notifikasi akan ditampilkan di sini. Fitur ini sedang dalam pengembangan.</p>
            </div>
        </div>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="search-container">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari kursus, tugas, atau materi...">
                    </div>
                </div>

                <div class="header-actions">
                    <div class="notification-btn" id="notificationBtn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="messages-btn">
                        <i class="fas fa-envelope"></i>
                        <span class="notification-badge">5</span>
                    </div>
                    <div class="profile-btn">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content">
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <h1>Selamat Datang, John!</h1>
                    <p>Kamu memiliki 3 tugas yang perlu diselesaikan minggu ini. Jangan lupa untuk memeriksa jadwal kuliah
                        Anda.</p>
                    <div class="banner-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon courses">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">8</div>
                            <div class="stat-label">Kursus Diikuti</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon tasks">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">5</div>
                            <div class="stat-label">Tugas Tertunda</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon messages">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">12</div>
                            <div class="stat-label">Pesan Baru</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon announcements">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">3</div>
                            <div class="stat-label">Pengumuman</div>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout -->
                <div class="two-column">
                    <!-- Left Column -->
                    <div>
                        <!-- My Courses -->
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Kursus Saya</h2>
                                <a href="#" class="view-all">
                                    Lihat Semua
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>

                            <div class="courses-grid">
                                <div class="course-card">
                                    <div class="course-header">
                                        <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='%232563eb'/><text x='150' y='60' font-family='Arial' font-size='20' fill='white' text-anchor='middle'>Pemrograman Web</text></svg>"
                                            alt="Pemrograman Web" class="course-image">
                                        <div class="course-category">TI</div>
                                    </div>
                                    <div class="course-body">
                                        <h3 class="course-title">Pemrograman Web Modern</h3>
                                        <div class="course-instructor">
                                            <i class="fas fa-user"></i>
                                            Prof. Ahmad S.T., M.T.
                                        </div>
                                        <div class="course-progress">
                                            <div class="progress-info">
                                                <span>Progress</span>
                                                <span>65%</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-value" style="width: 65%;"></div>
                                            </div>
                                        </div>
                                        <button class="course-button">Lanjutkan Belajar</button>
                                    </div>
                                </div>

                                <div class="course-card">
                                    <div class="course-header">
                                        <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='%23f59e0b'/><text x='150' y='60' font-family='Arial' font-size='20' fill='white' text-anchor='middle'>Basis Data</text></svg>"
                                            alt="Basis Data" class="course-image">
                                        <div class="course-category">TI</div>
                                    </div>
                                    <div class="course-body">
                                        <h3 class="course-title">Sistem Basis Data Lanjut</h3>
                                        <div class="course-instructor">
                                            <i class="fas fa-user"></i>
                                            Dr. Sari W.S.T., M.Sc.
                                        </div>
                                        <div class="course-progress">
                                            <div class="progress-info">
                                                <span>Progress</span>
                                                <span>42%</span>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-value" style="width: 42%;"></div>
                                            </div>
                                        </div>
                                        <button class="course-button">Lanjutkan Belajar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Aktivitas Terbaru</h2>
                                <a href="#" class="view-all">
                                    Lihat Semua
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>

                            <ul class="activity-list">
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h3 class="activity-title">Mengumpulkan tugas Pemrograman Web</h3>
                                        <div class="activity-time">2 jam yang lalu</div>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h3 class="activity-title">Mengirim pesan di forum Diskusi</h3>
                                        <div class="activity-time">5 jam yang lalu</div>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-download"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h3 class="activity-title">Mengunduh materi pembelajaran</h3>
                                        <div class="activity-time">Kemarin, 15:32</div>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h3 class="activity-title">Menonton video pembelajaran</h3>
                                        <div class="activity-time">Kemarin, 10:15</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <!-- Upcoming Events -->
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Acara Mendatang</h2>
                                <a href="#" class="view-all">
                                    Lihat Semua
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>

                            <ul class="events-list">
                                <li class="event-item">
                                    <div class="event-date">
                                        <div class="event-day">15</div>
                                        <div class="event-month">Nov</div>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title">Ujian Tengah Semester</h3>
                                        <div class="event-details">
                                            <i class="fas fa-clock"></i>
                                            08:00 - 10:00 WIB
                                        </div>
                                    </div>
                                </li>
                                <li class="event-item">
                                    <div class="event-date">
                                        <div class="event-day">18</div>
                                        <div class="event-month">Nov</div>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title">Webinar Teknologi Terkini</h3>
                                        <div class="event-details">
                                            <i class="fas fa-clock"></i>
                                            13:00 - 15:00 WIB
                                        </div>
                                    </div>
                                </li>
                                <li class="event-item">
                                    <div class="event-date">
                                        <div class="event-day">22</div>
                                        <div class="event-month">Nov</div>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title">Batas Pengumpulan Tugas</h3>
                                        <div class="event-details">
                                            <i class="fas fa-clock"></i>
                                            23:59 WIB
                                        </div>
                                    </div>
                                </li>
                                <li class="event-item">
                                    <div class="event-date">
                                        <div class="event-day">25</div>
                                        <div class="event-month">Nov</div>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title">Kuliah Tamu - Industry 4.0</h3>
                                        <div class="event-details">
                                            <i class="fas fa-clock"></i>
                                            09:00 - 11:00 WIB
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Quick Actions -->
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Aksi Cepat</h2>
                            </div>

                            <div class="quick-actions">
                                <button class="action-btn">
                                    <i class="fas fa-tasks"></i>
                                    <span>Tugas</span>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-calendar"></i>
                                    <span>Jadwal</span>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-book"></i>
                                    <span>Materi</span>
                                </button>
                                <button class="action-btn">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Nilai</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script src="{{ asset('js/dash.js') }}"></script>
    @endpush
@endsection

@endcomponent