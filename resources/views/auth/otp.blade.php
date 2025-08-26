<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kode OTP Anda</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px;">
    <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; padding: 20px; box-shadow:0 2px 6px rgba(0,0,0,0.1)">
        <h2 style="color:#333;">Halo, {{ $username }}</h2>
        
        <p>Kami menerima permintaan untuk memverifikasi akun Anda.</p>
        
        <p><strong>Kode OTP Anda adalah:</strong></p>
        
        <h1 style="text-align:center; background:#f3f3f3; padding:15px; border-radius:6px; letter-spacing:5px; color:#2c3e50;">
            {{ $otp }}
        </h1>

        <p>Kode ini berlaku selama <strong>{{ $expired }} menit</strong>.  
        Demi keamanan akun Anda, jangan bagikan kode ini kepada siapapun, termasuk pihak yang mengaku dari tim kami.</p>

        <hr>
        <p style="font-size: 12px; color: #888;">Jika Anda tidak merasa meminta kode ini, abaikan email ini.</p>
        <p style="font-size: 12px; color: #888;">&copy; {{ date('Y') }} {{ config('app.name') }} - Semua Hak Dilindungi</p>
    </div>
</body>
</html>
