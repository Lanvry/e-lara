<nav class="navbar flex justify-between items-center py-6 mb-8" data-aos="fade-in" aria-label="Main navigation">
    <div class="flex items-center">
        <div class="w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl mr-3" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="0"
            aria-hidden="true">
            EC
        </div>
        <span class="text-2xl font-bold text-primary" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="300">{{env('APP_NAME')}}</span>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden lg:flex space-x-10">
        <a href="{{url('./')}}" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200" class="text-primary font-medium hover:text-secondary transition">Beranda</a>
        <a href="{{url('./#features')}}" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" class="text-gray-600 font-medium hover:text-primary transition">Fitur</a>
        <a href="{{url('./#programs')}}" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0" class="text-gray-600 font-medium hover:text-primary transition">Program</a>
        <a href="{{url('./#about')}}" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" class="text-gray-600 font-medium hover:text-primary transition">Tentang</a>
        <a href="{{url('./#contact')}}" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200" class="text-gray-600 font-medium hover:text-primary transition">Kontak</a>
    </div>

    <div class="hidden lg:flex space-x-4">
        <a href="{{route('login')}}"
            class="px-6 py-2 text-primary font-medium hover:bg-blue-50 rounded-full transition" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="400">Masuk</a>
        <a href="{{route('register')}}"
            class="px-6 py-2 bg-primary text-white font-medium rounded-full hover:bg-secondary transition" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="200">Daftar</a>
    </div>

    <!-- Mobile menu button -->
    <button id="mobile-menu-button" class="lg:hidden text-primary focus:outline-none" aria-label="Toggle mobile menu"
        aria-expanded="false">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <!-- Mobile menu -->
    <div id="mobile-menu"
        class="mobile-menu absolute top-full left-0 w-full bg-white shadow-lg rounded-lg py-4 px-6 mt-2 z-50 hidden">
        <a href="{{url('./')}}" class="block py-2 text-primary font-medium">Beranda</a>
        <a href="{{url('./#features')}}" class="block py-2 text-gray-600 font-medium">Fitur</a>
        <a href="{{url('./#programs')}}" class="block py-2 text-gray-600 font-medium">Program</a>
        <a href="{{url('./#about')}}" class="block py-2 text-gray-600 font-medium">Tentang</a>
        <a href="{{url('./#contact')}}" class="block py-2 text-gray-600 font-medium">Kontak</a>
        <div class="border-t border-gray-200 mt-4 pt-4">
            <a href="{{route('login')}}" class="block py-2 text-center text-primary font-medium mb-2">Masuk</a>
            <a href="{{route('register')}}"
                class="block py-2 text-center bg-primary text-white font-medium rounded-full">Daftar</a>
        </div>
    </div>
</nav>