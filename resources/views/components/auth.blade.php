<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Arsip Digital Kelurahan Rajawali</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <x-datetarget></x-datetarget>
        <div class="container shadow mx-auto mt-5">
            <div id="auth-left">
                <h1 class="auth-title">Arsip Digital</h1>
                <p class="auth-subtitle mb-5">Masuk dengan akun terdaftar.</p>
                {{ $slot }}
            </div>
        </div>
        @env('local')
        <script src="<http://localhost:35729/livereload.js>"></script>
        @endenv

    </div>
</body>

</html>
