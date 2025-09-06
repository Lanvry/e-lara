@component('dashboard.layout')

@section("content-dash")
    <!-- Welcome Banner -->
    <div class="welcome-banner" role="banner" aria-label="Selamat datang">
        <h1>Selamat Datang, {{Auth::user()->name}}!</h1>
        <p>Kamu memiliki 3 tugas yang perlu diselesaikan minggu ini. Jangan lupa untuk memeriksa jadwal kuliah
            Anda.</p>
        <div class="banner-icon" aria-hidden="true">
            <i class="fas fa-graduation-cap"></i>
        </div>
    </div>

    <!-- Stats Grid -->
    <section class="stats-grid" aria-label="Statistik dashboard">
        <div class="stat-card">
            <div class="stat-icon courses" aria-hidden="true">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">8</div>
                <div class="stat-label">Kursus Diikuti</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon tasks" aria-hidden="true">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">5</div>
                <div class="stat-label">Tugas Tertunda</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon messages" aria-hidden="true">
                <i class="fas fa-comments"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">12</div>
                <div class="stat-label">Pesan Baru</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon announcements" aria-hidden="true">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value">3</div>
                <div class="stat-label">Pengumuman</div>
            </div>
        </div>
    </section>

    <!-- Two Column Layout -->
    <div class="two-column">
        <!-- Left Column -->
        <div>
            <!-- My Courses -->
            <section class="section" aria-labelledby="my-courses-heading">
                <div class="section-header">
                    <h2 class="section-title" id="my-courses-heading">Kursus Saya</h2>
                    <a href="/kursus" class="view-all">
                        Lihat Semua
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="courses-grid">
                    <article class="course-card">
                        <div class="course-header">
                            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='%232563eb'/><text x='150' y='60' font-family='Arial' font-size='20' fill='white' text-anchor='middle'>Pemrograman Web</text></svg>"
                                alt="Ilustrasi kursus Pemrograman Web" class="course-image">
                            <div class="course-category">TI</div>
                        </div>
                        <div class="course-body">
                            <h3 class="course-title">Pemrograman Web Modern</h3>
                            <div class="course-instructor">
                                <i class="fas fa-user" aria-hidden="true"></i>
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
                            <a href="/kursus/pemrograman-web" class="course-button">Lanjutkan Belajar</a>
                        </div>
                    </article>

                    <article class="course-card">
                        <div class="course-header">
                            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='300' height='120' viewBox='0 0 300 120'><rect width='300' height='120' fill='%23f59e0b'/><text x='150' y='60' font-family='Arial' font-size='20' fill='white' text-anchor='middle'>Basis Data</text></svg>"
                                alt="Ilustrasi kursus Basis Data" class="course-image">
                            <div class="course-category">TI</div>
                        </div>
                        <div class="course-body">
                            <h3 class="course-title">Sistem Basis Data Lanjut</h3>
                            <div class="course-instructor">
                                <i class="fas fa-user" aria-hidden="true"></i>
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
                            <a href="/kursus/basis-data" class="course-button">Lanjutkan Belajar</a>
                        </div>
                    </article>
                </div>
            </section>

            <!-- Recent Activity -->
            <section class="section" aria-labelledby="recent-activity-heading">
                <div class="section-header">
                    <h2 class="section-title" id="recent-activity-heading">Aktivitas Terbaru</h2>
                    <a href="/aktivitas" class="view-all">
                        Lihat Semua
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>

                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon" aria-hidden="true">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-title">Mengumpulkan tugas Pemrograman Web</h3>
                            <time datetime="{{ now()->subHours(2)->toIso8601String() }}" class="activity-time">2 jam yang lalu</time>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon" aria-hidden="true">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-title">Mengirim pesan di forum Diskusi</h3>
                            <time datetime="{{ now()->subHours(5)->toIso8601String() }}" class="activity-time">5 jam yang lalu</time>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon" aria-hidden="true">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-title">Mengunduh materi pembelajaran</h3>
                            <time datetime="{{ now()->subDay()->setTime(15, 32)->toIso8601String() }}" class="activity-time">Kemarin, 15:32</time>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon" aria-hidden="true">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-title">Menonton video pembelajaran</h3>
                            <time datetime="{{ now()->subDay()->setTime(10, 15)->toIso8601String() }}" class="activity-time">Kemarin, 10:15</time>
                        </div>
                    </li>
                </ul>
            </section>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Upcoming Events -->
            <section class="section" aria-labelledby="upcoming-events-heading">
                <div class="section-header">
                    <h2 class="section-title" id="upcoming-events-heading">Acara Mendatang</h2>
                    <a href="/acara" class="view-all">
                        Lihat Semua
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>

                <ul class="events-list">
                    <li class="event-item">
                        <div class="event-date" aria-hidden="true">
                            <div class="event-day">15</div>
                            <div class="event-month">Nov</div>
                        </div>
                        <div class="event-content">
                            <h3 class="event-title">Ujian Tengah Semester</h3>
                            <div class="event-details">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <time datetime="2023-11-15T08:00:00+07:00">08:00 - 10:00 WIB</time>
                            </div>
                        </div>
                    </li>
                    <li class="event-item">
                        <div class="event-date" aria-hidden="true">
                            <div class="event-day">18</div>
                            <div class="event-month">Nov</div>
                        </div>
                        <div class="event-content">
                            <h3 class="event-title">Webinar Teknologi Terkini</h3>
                            <div class="event-details">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <time datetime="2023-11-18T13:00:00+07:00">13:00 - 15:00 WIB</time>
                            </div>
                        </div>
                    </li>
                    <li class="event-item">
                        <div class="event-date" aria-hidden="true">
                            <div class="event-day">22</div>
                            <div class="event-month">Nov</div>
                        </div>
                        <div class="event-content">
                            <h3 class="event-title">Batas Pengumpulan Tugas</h3>
                            <div class="event-details">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <time datetime="2023-11-22T23:59:00+07:00">23:59 WIB</time>
                            </div>
                        </div>
                    </li>
                    <li class="event-item">
                        <div class="event-date" aria-hidden="true">
                            <div class="event-day">25</div>
                            <div class="event-month">Nov</div>
                        </div>
                        <div class="event-content">
                            <h3 class="event-title">Kuliah Tamu - Industry 4.0</h3>
                            <div class="event-details">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <time datetime="2023-11-25T09:00:00+07:00">09:00 - 11:00 WIB</time>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>

            <!-- Quick Actions -->
            <section class="section" aria-labelledby="quick-actions-heading">
                <div class="section-header">
                    <h2 class="section-title" id="quick-actions-heading">Aksi Cepat</h2>
                </div>

                <nav class="quick-actions" aria-label="Aksi cepat">
                    <a href="/tugas" class="action-btn">
                        <i class="fas fa-tasks" aria-hidden="true"></i>
                        <span>Tugas</span>
                    </a>
                    <a href="/jadwal" class="action-btn">
                        <i class="fas fa-calendar" aria-hidden="true"></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="/materi" class="action-btn">
                        <i class="fas fa-book" aria-hidden="true"></i>
                        <span>Materi</span>
                    </a>
                    <a href="/nilai" class="action-btn">
                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                        <span>Nilai</span>
                    </a>
                </nav>
            </section>
        </div>
    </div>
@endsection
@endcomponent