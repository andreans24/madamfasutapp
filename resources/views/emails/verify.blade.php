<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email</title>
</head>

<body>
    <h1>Halo, {{ $admin->name }}</h1>
    <p>Terima kasih telah mendaftar admin Madam Fasut! Silakan klik tautan di bawah ini untuk memverifikasi email Anda:
    </p>
    <a href="{{ route('verification.verify', $admin->id) }}">Verifikasi Email</a>
</body>

</html>
