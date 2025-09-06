@component('components.layout')

@section('body-class', 'min-h-screen flex')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    @endpush
    <!-- Bagian kiri: Form login -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white" data-aos="fade-right"
        data-aos-duration="1000" data-aos-delay="200">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex items-center justify-center mb-10">
                <img class="logo" src="{{asset('image/e-lara.png')}}" alt="">
            </div>

            <!-- Form title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-2" data-aos="fade-right" data-aos-duration="1000"
                data-aos-delay="0">Masuk ke Akun Anda</h1>
            <p class="text-gray-600 mb-10" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">Selamat
                datang kembali! Silakan masuk untuk melanjutkan</p>

            <!-- Form login -->
            <form class="space-y-6">
                <!-- Email input -->
                <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition" data-aos="fade-right"
                    data-aos-duration="1000" data-aos-delay="200">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                        <input type="email" name="email" placeholder="nama@email.com"
                            class="w-full bg-transparent focus:outline-none" required>
                    </div>
                </div>

                <!-- Password input -->
                <div class="input-focused bg-gray-50 rounded-xl p-4 border border-gray-200 transition" data-aos="fade-right"
                    data-aos-duration="1000" data-aos-delay="300">
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <a href="#" class="text-sm text-primary hover:text-secondary">Lupa kata sandi?</a>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-lock text-gray-400 mr-3"></i>
                        <input type="password" name="password" placeholder="Masukkan kata sandi"
                            class="w-full bg-transparent focus:outline-none" required>
                        <button type="button" class="text-gray-400 hover:text-gray-600" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                {{-- <!-- Remember me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember"
                        class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                </div> --}}

                <!-- Submit button -->
                <button type="submit" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400"
                    class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition focus:outline-none focus:ring-4 focus:ring-blue-200">
                    Masuk
                </button>
            </form>



            <!-- Sign up link -->
            <div class="text-center mt-10">
                <p class="text-gray-600">Belum punya akun? <a href="{{route('register')}}"
                        class="text-primary font-medium hover:text-secondary">Daftar sekarang</a></p>
            </div>
        </div>
    </div>

    <!-- Bagian kanan: Ilustrasi -->
    <div class="hidden lg:flex lg:w-1/2 items-center justify-center p-12 text-white relative overflow-hidden">
        <div class="ambient-circle circle-1"></div>
        <div class="ambient-circle circle-2"></div>

        <div class="max-w-md relative z-10" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <h2 class="text-4xl font-bold mb-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="0">Platform
                E-Learning Terbaik untuk Kampus</h2>
            <p class="text-xl opacity-90 mb-10" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100">Akses
                materi kuliah, ikuti kelas online, dan berkolaborasi dengan mudah di
                satu platform terintegrasi.</p>

            <div class="space-y-6">
                <div class="flex items-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <p>Dosen dan Mahasiswa Terverifikasi</p>
                </div>

                <div class="flex items-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <p>Keamanan Data Terjamin</p>
                </div>

                <div class="flex items-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <p>Akses Materi Kapan Saja</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Toggle password visibility
                const togglePassword = document.getElementById('togglePassword');
                const passwordInput = document.querySelector('input[type="password"]');

                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Ganti icon
                    const eyeIcon = this.querySelector('i');
                    if (type === 'text') {
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });

                // Form submission
                const loginForm = document.querySelector('form');
                loginForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // Simulasi proses login
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.textContent;

                    // Tampilkan loading state
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                    submitButton.disabled = true;

                    // Simulasi request
                    setTimeout(function () {
                        // Kembalikan ke state semula
                        fetch('/auth/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                email: loginForm.email.value,
                                password: loginForm.password.value
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    window.location.href = data.redirect;
                                } else {
                                    alert(data.message);
                                    if (data.href) {
                                        window.location.href = data.href;
                                    }
                                }
                                submitButton.textContent = originalText;
                                submitButton.disabled = false;
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan. Silakan coba lagi.');
                                submitButton.textContent = originalText;
                                submitButton.disabled = false;
                            });



                        // window.location.href = '/dashboard'; // Uncomment untuk redirect sebenarnya
                    }, 2000);
                });
            });
        </script>
    @endpush
@endsection

@endcomponent