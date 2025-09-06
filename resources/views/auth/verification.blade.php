@component('components.layout')

@section('body-class', 'min-h-screen flex')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/otp.css')}}">
    @endpush
    <!-- Bagian kiri: Form OTP -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex items-center justify-center mb-10">
                <img class="logo" src="{{asset('image/e-lara.png')}}" alt="">
            </div>

            {{-- <!-- Progress bar -->
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-10">
                <div class="bg-primary h-2.5 rounded-full" style="width: 66%"></div>
            </div> --}}

            <!-- Form title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Verifikasi Email Anda</h1>
            <p class="text-gray-600 mb-6">Kami telah mengirimkan kode OTP ke <span
                    class="font-semibold text-primary">{{$email}}</span></p>

            {{-- <!-- Countdown timer bar -->
            <div class="w-full bg-gray-200 rounded-full h-1 mb-6">
                <div class="countdown-bar h-1 rounded-full"></div>
            </div> --}}

            <!-- Form OTP -->
            <form class="space-y-6" id="otp-form">
                <!-- OTP inputs -->
                <div class="flex justify-between mb-8">
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric"
                        autocomplete="one-time-code" required>
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric" required>
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric" required>
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric" required>
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric" required>
                    <input type="text" maxlength="1" class="otp-input" pattern="[0-9]*" inputmode="numeric" required>
                </div>

                {{-- <!-- Timer and resend -->
                <div class="text-center mb-8">
                    <p class="text-gray-600" id="timer">Kirim ulang kode dalam <span id="countdown">01:00</span></p>
                </div> --}}

                <!-- Submit button -->
                <button type="submit"
                    class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-secondary transition focus:outline-none focus:ring-4 focus:ring-blue-200">
                    Verifikasi
                </button>
            </form>

            <!-- Resend code link -->
            <div class="text-center mt-8">
                <p class="text-gray-600">Tidak menerima kode? <a class="text-primary font-medium hover:text-secondary"
                        id="resend-link">Kirim ulang</a></p>
            </div>

            <!-- Support link -->
            <div class="text-center mt-16">
                <p class="text-gray-500">Butuh bantuan? <a href="#"
                        class="text-primary font-medium hover:text-secondary">Hubungi kami</a></p>
            </div>
        </div>
    </div>

    <!-- Bagian kanan: Ilustrasi -->
    <div class="hidden lg:flex lg:w-1/2 otp-bg items-center justify-center p-12 text-white relative overflow-hidden">
        <div class="ambient-circle circle-1"></div>
        <div class="ambient-circle circle-2"></div>

        <div class="max-w-md relative z-10">
            <div class="flex justify-center mb-10">
                <div class="w-32 h-32 rounded-full bg-white bg-opacity-10 flex items-center justify-center">
                    <i class="fas fa-envelope text-5xl"></i>
                </div>
            </div>

            <h2 class="text-4xl font-bold mb-6 text-center">Verifikasi Keamanan</h2>
            <p class="text-xl opacity-90 mb-10 text-center">Kami mengirimkan kode OTP ke email Anda untuk memastikan
                keamanan akun Anda.</p>

            <div class="space-y-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <p>Proses verifikasi yang aman dan terenkripsi</p>
                </div>

                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <p>Kode OTP berlaku dalam 10 menit</p>
                </div>

                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-10 flex items-center justify-center mr-4">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <p>Lindungi akun Anda dari akses tidak sah</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Auto move to next input

                const inputs = document.querySelectorAll('.otp-input');

                inputs.forEach((input, index) => {
                    input.addEventListener('input', function (e) {
                        // Auto-tab to next input
                        if (this.value.length === 1 && index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }

                        // Auto-submit when all inputs are filled
                        const allFilled = Array.from(inputs).every(input => input.value.length === 1);
                        if (allFilled) {
                            document.getElementById('otp-form').dispatchEvent(new Event('otp-submit'));
                        }
                    });

                    // Allow only numeric input
                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Backspace' && this.value === '' && index > 0) {
                            inputs[index - 1].focus();
                        }

                        // Prevent non-numeric characters
                        if (e.key.length === 1 && !/^\d$/.test(e.key)) {
                            e.preventDefault();
                        }
                    });
                });

                // Countdown timer
                let timeLeft = 60;
                const timerElement = document.getElementById('countdown');
                const resendLink = document.getElementById('resend-link');
                if (sessionStorage.getItem('resendClicked') == 'true') {
                    resendLink.style.display = "none";
                }
                const countdown = setInterval(function () {
                    timeLeft--;

                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;

                    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                    if (timeLeft <= 0) {
                        clearInterval(countdown);
                        timerElement.parentElement.textContent = "Kode OTP telah kadaluarsa";
                        resendLink.style.display = "inline";
                    }
                }, 1000);

                // Resend OTP functionality
                resendLink.addEventListener('click', function (e) {
                    e.preventDefault();

                    window.location.href = '/auth/resend-otp';

                    sessionStorage.setItem('resendClicked', 'true');
                    // Reset timer
                    timeLeft = 60;
                    timerElement.textContent = "01:00";
                    timerElement.parentElement.textContent = "Kirim ulang kode dalam 01:00";
                    resendLink.style.display = "none";

                    // Restart countdown
                    clearInterval(countdown);
                    const newCountdown = setInterval(function () {
                        timeLeft--;

                        const minutes = Math.floor(timeLeft / 60);
                        const seconds = timeLeft % 60;

                        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                        if (timeLeft <= 0) {
                            clearInterval(newCountdown);
                            timerElement.parentElement.textContent = "Kode OTP telah kadaluarsa";
                            resendLink.style.display = "inline";
                        }
                    }, 1000);

                    // Reset animation
                    const countdownBar = document.querySelector('.countdown-bar');
                    countdownBar.style.animation = 'none';
                    setTimeout(() => {
                        countdownBar.style.animation = 'countdown 60s linear forwards';
                    }, 10);

                    // Show success message (simulasi pengiriman ulang)
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg z-50';
                    notification.innerHTML = `
                                            <div class="flex items-center">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <span>Kode OTP baru telah dikirim ke email Anda</span>
                                            </div>
                                        `;
                    document.body.appendChild(notification);

                    // Remove notification after 3 seconds
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                });

                // Form submission
                const otpForm = document.getElementById('otp-form');
                otpForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // Get OTP value
                    const otp = Array.from(inputs).map(input => input.value).join('');

                    // Validate OTP (simulasi)
                    if (otp.length !== 6) {
                        // Show error
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6';
                        errorDiv.innerHTML = `
                                                <div class="flex items-center">
                                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                                    <span>Harap masukkan semua digit kode OTP</span>
                                                </div>
                                            `;

                        // Remove any existing error
                        const existingError = otpForm.querySelector('.bg-red-100');
                        if (existingError) {
                            existingError.remove();
                        }

                        otpForm.prepend(errorDiv);
                        return;
                    }

                    // Simulate verification process
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.innerHTML;

                    // Show loading state
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memverifikasi...';
                    submitButton.disabled = true;

                    // Simulate API call
                    setTimeout(function () {
                        // For demo purposes, assume OTP is correct if it's 123456
                        // alert(JSON.stringify({ otpInput: otp }));
                        fetch('/auth/verifyOTP', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ otpInput: otp })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Success - redirect to dashboard
                                    window.location.href = '/dashboard';
                                } else {
                                    // Show error // Show error
                                    const errorDiv = document.createElement('div');
                                    errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6';
                                    errorDiv.innerHTML = `
                                                    <div class="flex items-center">
                                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                                        <span>Kode OTP tidak valid. Silakan coba lagi.</span>
                                                    </div>
                                                `;

                                    // Remove any existing error
                                    const existingError = otpForm.querySelector('.bg-red-100');
                                    if (existingError) {
                                        existingError.remove();
                                    }

                                    otpForm.prepend(errorDiv);

                                    // Clear inputs
                                    inputs.forEach(input => {
                                        input.value = '';
                                    });
                                    inputs[0].focus();

                                    // Restore button
                                    submitButton.innerHTML = originalText;
                                    submitButton.disabled = false;
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                // Handle error appropriately in production
                                // Show error
                                const errorDiv = document.createElement('div');
                                errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6';
                                errorDiv.innerHTML = `
                                                    <div class="flex items-center">
                                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                                        <span>Terjadi kesalahan tidak terduga</span>
                                                    </div>
                                                `;

                                // Remove any existing error
                                const existingError = otpForm.querySelector('.bg-red-100');
                                if (existingError) {
                                    existingError.remove();
                                }

                                otpForm.prepend(errorDiv);

                                // Clear inputs
                                inputs.forEach(input => {
                                    input.value = '';
                                });
                                inputs[0].focus();

                                // Restore button
                                submitButton.innerHTML = originalText;
                                submitButton.disabled = false;
                            });
                    }, 2000);
                });

                // Focus first input on load
                inputs[0].focus();
            });
        </script>
    @endpush
@endsection

@endcomponent