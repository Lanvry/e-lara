<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('auth.registerPage', [
            "prodis" => Prodi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Ambil user
        $user = User::where('email', $credentials['email'])->first();

        // Cek verifikasi email
        if ($user && is_null($user->email_verified_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Email Anda belum diverifikasi. Silakan cek email untuk verifikasi OTP.'
            ], 403); // 403 Forbidden
        }

        // Cek login (email + password)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil login!',
                'redirect' => url('/dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah.'
        ], 401);
    }


    public function registerPost(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'NRP'      => ['required', 'digits:10'],
            'prodi_id' => ['required', 'exists:prodis,id'],
        ]);

        // Simpan password asli dulu
        $plainPassword = $validatedData['password'];

        // Hash password sebelum disimpan
        $validatedData['password'] = bcrypt($plainPassword);

        // Simpan user baru
        Session::put('akses', 'register');
        User::create($validatedData);

        // Login otomatis
        if (Auth::attempt([
            'email'    => $request->email,
            'name'     => $request->name,
            'password' => $plainPassword, // pakai password asli
        ])) {
            $request->session()->regenerate();
            return back()->with('success', 'Berhasil Registrasi! Silakan verifikasi OTP.');
        }

        // return redirect('/auth/login')->with('error', 'Registrasi berhasil, silakan login.');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otpInput' => 'required|digits:6',
        ]);

        $otp = Session::get('otp');
        $expiresAt = Session::get('otp_expires_at');

        if (!$otp || !$expiresAt || now()->gt($expiresAt)) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP sudah kadaluarsa.'
            ]);
        }

        if ($request->otpInput == $otp) {
            // OTP benar → hapus dari session biar sekali pakai
            Session::forget(['otp', 'otp_expires_at']);
            User::where('id', Auth::id())->update([
                'email_verified_at' => now()
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Verifikasi berhasil!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kode OTP salah.'
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
