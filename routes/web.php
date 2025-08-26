<?php

use App\Mail\Mailers;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');
Route::get("/auth/login", function () {
    return view('auth.loginPage');
})->name(('login'));
Route::post("/auth/login", [AuthController::class, 'login'])->name('loginPost');
Route::get("/auth/register", [AuthController::class, 'register'])->name('register');
Route::post('/auth/register', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/auth', function () {
    return redirect('/auth/login');
});


use Illuminate\Support\Facades\Session;

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
    Route::get('auth/resend-otp', function (){
        Session::put('akses', 'register');
        return redirect('/auth/send-otp');
    });
    Route::post('/auth/verifyOTP', [AuthController::class, 'verifyOTP'])->name('verifyOTP');
});
