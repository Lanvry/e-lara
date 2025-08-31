<?php

use App\Mail\Mailers;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;

Route::get('/', [LandingController::class, 'index'])->name('landingPage');
Route::get('/chat', function () {
    return view('dashboard.chat');
})->name('chat');
Route::get('/programs/list', [LandingController::class, 'listProdi'])->name('listProdi');
Route::post('/programs/list', [LandingController::class, 'searchlistProdi'])->name('searchlistProdi');
Route::get('programs/{slug}/courses', [LandingController::class, 'prodiCourses'])->name('prodiCourses');
Route::get("/auth/login", function () {
    return view('auth.loginPage');
})->name(('login'));
Route::post("/auth/login", [AuthController::class, 'login'])->name('loginPost');
Route::get("/auth/register", [AuthController::class, 'register'])->name('register');
Route::post('/auth/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/auth', function () {
    return redirect('/auth/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/send-otp', function () {
        if (Session::get('akses') == "register") {
            $otp = rand(100000, 999999);
            $username = Auth::user()->name;
            $email = Auth::user()->email;

            // simpan ke session
            Session::put('otp', $otp);
            Session::put('otp_expires_at', now()->addMinutes(5));
            Session::put('akses', 'verified'); // ganti akses biar gak bisa kirim ulang terus
            // kirim email
            Mail::to($email)->send(new OtpMail($otp, $username));

            return redirect('/auth/verification'); // langsung arahkan ke halaman input OTP
        } else {
            return redirect('/dashboard'); // kalau udah verifikasi, langsung ke dashboard
        }
    });
    Route::get('/auth/verification', function () {
        return view('auth.verification', [
            'username' => Auth::user()->name,
            'email' => Auth::user()->email
        ]);
    });
    Route::get('auth/resend-otp', function () {
        Session::put('akses', 'register');
        return redirect('/auth/send-otp');
    });
    Route::post('/auth/verifyOTP', [AuthController::class, 'verifyOTP'])->name('verifyOTP');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // routes/web.php atau routes/api.php
    Route::post('/chatbot', [ChatbotController::class, 'generate']);
});
