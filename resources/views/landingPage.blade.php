@component("components.layout")

@section('body-class', 'bg-light min-h-screen flex items-center justify-center p-4')

@section('content')
    {{-- <div class="ambient-circle circle-1"></div> --}}
    <div class="ambient-circle circle-2"></div>

    <div class="container max-w-6xl mx-auto">
        <!-- Navigation -->
        <nav class="flex justify-between items-center py-6 mb-8 relative" aria-label="Main navigation">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl mr-3"
                    aria-hidden="true">
                    EC
                </div>
                <span class="text-2xl font-bold text-primary">{{env('APP_NAME')}}</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-10">
                <a href="#" class="text-primary font-medium hover:text-secondary transition">Beranda</a>
                <a href="#features" class="text-gray-600 font-medium hover:text-primary transition">Fitur</a>
                <a href="#programs" class="text-gray-600 font-medium hover:text-primary transition">Program</a>
                <a href="#about" class="text-gray-600 font-medium hover:text-primary transition">Tentang</a>
                <a href="#contact" class="text-gray-600 font-medium hover:text-primary transition">Kontak</a>
            </div>

            <div class="hidden lg:flex space-x-4">
                <a href="{{route('login')}}"
                    class="px-6 py-2 text-primary font-medium hover:bg-blue-50 rounded-full transition">Masuk</a>
                <a href="{{route('register')}}"
                    class="px-6 py-2 bg-primary text-white font-medium rounded-full hover:bg-secondary transition">Daftar</a>
            </div>

            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="lg:hidden text-primary focus:outline-none"
                aria-label="Toggle mobile menu" aria-expanded="false">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Mobile menu -->
            <div id="mobile-menu"
                class="mobile-menu absolute top-full left-0 w-full bg-white shadow-lg rounded-lg py-4 px-6 mt-2 z-50 hidden">
                <a href="#" class="block py-2 text-primary font-medium">Beranda</a>
                <a href="#features" class="block py-2 text-gray-600 font-medium">Fitur</a>
                <a href="#programs" class="block py-2 text-gray-600 font-medium">Program</a>
                <a href="#about" class="block py-2 text-gray-600 font-medium">Tentang</a>
                <a href="#contact" class="block py-2 text-gray-600 font-medium">Kontak</a>
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <a href="{{route('login')}}" class="block py-2 text-center text-primary font-medium mb-2">Masuk</a>
                    <a href="{{route('register')}}"
                        class="block py-2 text-center bg-primary text-white font-medium rounded-full">Daftar</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main id="main-content">
            <section class="hero-bg rounded-3xl p-8 md:p-12 lg:p-16 mb-16 relative overflow-hidden"
                aria-labelledby="main-heading">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute -top-24 -right-24 w-64 h-64 border-4 border-white border-opacity-10 rounded-full">
                    </div>
                    <div
                        class="absolute -bottom-24 -left-24 w-64 h-64 border-4 border-white border-opacity-10 rounded-full">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10 text-white">
                        <h1 id="main-heading" class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">Tingkatkan Pengalaman
                            Belajar Mengajar Digital</h1>
                        <p class="text-lg md:text-xl opacity-90 mb-8">Platform e-learning terintegrasi untuk civitas
                            akademika kampus dengan fitur lengkap dan mudah digunakan.</p>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="/register"
                                class="px-6 py-3 sm:px-8 sm:py-4 bg-white text-primary font-bold rounded-full text-center hover:bg-blue-50 transition">Mulai
                                Sekarang</a>
                            <a href="#demo"
                                class="px-6 py-3 sm:px-8 sm:py-4 glass-effect text-white font-bold rounded-full text-center hover:bg-white hover:bg-opacity-10 transition">Lihat
                                Demo</a>
                        </div>
                    </div>

                    <div class="md:w-1/2 relative">
                        <div class="floating">
                            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='500' height='350' viewBox='0 0 500 350'><rect width='500' height='350' fill='%23f0f7ff' rx='20'/><circle cx='250' cy='120' r='70' fill='%232563eb'/><rect x='150' y='210' width='200' height='20' rx='10' fill='%233b82f6'/><rect x='180' y='240' width='140' height='15' rx='7.5' fill='%233b82f6' fill-opacity='0.7'/><rect x='120' y='270' width='260' height='10' rx='5' fill='%233b82f6' fill-opacity='0.5'/></svg>"
                                alt="Ilustrasi Platform E-Learning EduCampus - Kelas Virtual dan Pembelajaran Online"
                                class="rounded-2xl shadow-xl w-full">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Program Studi Section -->
            <section id="programs" class="mb-16" aria-labelledby="programs-heading">
                <h2 id="programs-heading" class="text-3xl font-bold text-center text-primary mb-4">Program Studi Tersedia
                </h2>
                <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">Kami menyediakan berbagai program studi dengan
                    kurikulum terkini dan dosen berpengalaman</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">Teknik Informatika</h3>
                        <p class="text-gray-600 text-sm">Belajar pemrograman, AI, dan pengembangan perangkat lunak</p>
                        <a href="/program/teknik-informatika"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat detail</a>
                    </div>

                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">Sistem Informasi</h3>
                        <p class="text-gray-600 text-sm">Integrasi teknologi informasi dengan proses bisnis</p>
                        <a href="/program/sistem-informasi"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat detail</a>
                    </div>

                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">Teknik Komputer</h3>
                        <p class="text-gray-600 text-sm">Desain dan implementasi sistem komputer dan jaringan</p>
                        <a href="/program/teknik-komputer"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat detail</a>
                    </div>

                    <div class="program-card bg-white p-6 rounded-2xl shadow-md flex flex-col items-center text-center">
                        <div class="program-icon w-16 h-16 rounded-2xl text-white flex items-center justify-center text-2xl mb-4"
                            aria-hidden="true">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-2">Cyber Security</h3>
                        <p class="text-gray-600 text-sm">Keamanan siber dan proteksi sistem informasi</p>
                        <a href="/program/cyber-security"
                            class="mt-4 text-primary text-sm font-medium hover:underline">Lihat detail</a>
                    </div>
                </div>

                <div class="text-center mt-10">
                    <a href="/program-studi" class="inline-flex items-center text-primary font-medium hover:text-secondary">
                        Lihat semua program studi
                        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                    </a>
                </div>
            </section>

            <!-- Features Section -->
            <section id="features" class="mb-16" aria-labelledby="features-heading">
                <h2 id="features-heading" class="text-3xl font-bold text-center text-primary mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">Platform e-learning kami dirancang khusus untuk
                    memenuhi kebutuhan pembelajaran di lingkungan kampus</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="feature-card bg-white p-8 rounded-2xl shadow-md transition duration-300">
                        <div class="w-16 h-16 rounded-2xl bg-blue-100 text-primary flex items-center justify-center text-2xl mb-6"
                            aria-hidden="true">
                            <i class="fas fa-video"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-4">Kelas Virtual</h3>
                        <p class="text-gray-600">Selenggarakan kelas online interaktif dengan fitur video conference dan
                            kolaborasi real-time.</p>
                    </div>

                    <div class="feature-card bg-white p-8 rounded-2xl shadow-md transition duration-300">
                        <div class="w-16 h-16 rounded-2xl bg-blue-100 text-primary flex items-center justify-center text-2xl mb-6"
                            aria-hidden="true">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-4">Manajemen Tugas</h3>
                        <p class="text-gray-600">Berikan, kumpulkan, dan nilai tugas secara online dengan sistem yang
                            terintegrasi.</p>
                    </div>

                    <div class="feature-card bg-white p-8 rounded-2xl shadow-md transition duration-300">
                        <div class="w-16 h-16 rounded-2xl bg-blue-100 text-primary flex items-center justify-center text-2xl mb-6"
                            aria-hidden="true">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary mb-4">Analitik Pembelajaran</h3>
                        <p class="text-gray-600">Pantau perkembangan mahasiswa dengan dashboard analitik yang komprehensif.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Testimonial Section -->
            <section class="bg-white rounded-3xl p-8 md:p-10 shadow-md mb-16" aria-labelledby="testimonials-heading">
                <h2 id="testimonials-heading" class="text-3xl font-bold text-center text-primary mb-12">Apa Kata Pengguna?
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">
                    <div class="flex flex-col sm:flex-row">
                        <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center text-xl font-bold mr-6 flex-shrink-0 mb-4 sm:mb-0"
                            aria-hidden="true">
                            AD
                        </div>
                        <div>
                            <p class="text-gray-600 mb-4">"Platform yang sangat membantu selama perkuliahan daring. Fiturnya
                                lengkap dan antarmukanya user-friendly."</p>
                            <p class="font-bold text-primary">Ahmad Dani</p>
                            <p class="text-gray-500 text-sm">Dosen Teknik Informatika</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row">
                        <div class="w-16 h-16 rounded-full bg-secondary text-white flex items-center justify-center text-xl font-bold mr-6 flex-shrink-0 mb-4 sm:mb-0"
                            aria-hidden="true">
                            RS
                        </div>
                        <div>
                            <p class="text-gray-600 mb-4">"Sangat mudah mengakses materi kuliah dan mengumpulkan tugas.
                                Fitur diskusi nya juga sangat membantu."</p>
                            <p class="font-bold text-primary">Rina Sari</p>
                            <p class="text-gray-500 text-sm">Mahasiswa Ekonomi</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section id="demo"
                class="bg-gradient-to-r hero-bg from-primary to-secondary rounded-3xl p-8 md:p-10 text-center text-white mb-16 relative overflow-hidden"
                aria-labelledby="cta-heading">
                <div class="absolute top-0 left-0 w-full h-full z-10 overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 rounded-full bg-white opacity-5"></div>
                    <div class="absolute bottom-0 left-0 w-56 h-56 rounded-full bg-white opacity-5"></div>
                </div>

                <div class="z-50 relative">
                    <h2 id="cta-heading" class="text-2xl md:text-3xl font-bold mb-6">Siap Mengubah Pengalaman Belajar
                        Mengajar?</h2>
                    <p class="text-lg opacity-90 max-w-2xl mx-auto mb-8">Bergabung dengan ratusan kampus yang telah
                        menggunakan platform kami</p>
                    <a href="{{route('register')}}"
                        class="inline-block px-6 py-3 md:px-8 md:py-4 bg-white text-primary font-bold rounded-full hover:bg-blue-50 transition">Sign
                        Up</a>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="pt-10 pb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg mr-3"
                            aria-hidden="true">
                            EC
                        </div>
                        <span class="text-xl font-bold text-primary">{{env('APP_NAME')}}</span></span>
                    </div>
                    <p class="text-gray-600">Platform e-learning terdepan untuk lingkungan kampus di Indonesia.</p>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-primary mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="/tentang" class="text-gray-600 hover:text-primary transition">Tentang Kami</a></li>
                        <li><a href="/fitur" class="text-gray-600 hover:text-primary transition">Fitur</a></li>
                        <li><a href="/harga" class="text-gray-600 hover:text-primary transition">Pricing</a></li>
                        <li><a href="/blog" class="text-gray-600 hover:text-primary transition">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-primary mb-6">Dukungan</h3>
                    <ul class="space-y-3">
                        <li><a href="/bantuan" class="text-gray-600 hover:text-primary transition">Bantuan</a></li>
                        <li><a href="/kontak" class="text-gray-600 hover:text-primary transition">Hubungi Kami</a></li>
                        <li><a href="/faq" class="text-gray-600 hover:text-primary transition">FAQ</a></li>
                        <li><a href="/syarat-ketentuan" class="text-gray-600 hover:text-primary transition">Syarat &
                                Ketentuan</a></li>
                    </ul>
                </div>

                <div id="contact">
                    <h3 class="text-lg font-bold text-primary mb-6">Kontak</h3>
                    <address class="not-italic">
                        <ul class="space-y-3">
                            <li class="flex items-center text-gray-600"><i class="fas fa-map-marker-alt mr-3 text-primary"
                                    aria-hidden="true"></i> Jakarta, Indonesia</li>
                            <li class="flex items-center text-gray-600"><i class="fas fa-envelope mr-3 text-primary"
                                    aria-hidden="true"></i> info@educampus.id</li>
                            <li class="flex items-center text-gray-600"><i class="fas fa-phone-alt mr-3 text-primary"
                                    aria-hidden="true"></i> +62 21 1234 5678</li>
                        </ul>
                    </address>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-200 text-center">
                <p class="text-gray-600">© {{date('Y')}} {{env('APP_NAME')}}. All rights reserved.</p>
            </div>
        </footer>
    </div>
@endsection

@endcomponent