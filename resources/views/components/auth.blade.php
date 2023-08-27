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
    <div id="auth" class="d-flex justify-content-center align-items-center">
        <x-datetarget></x-datetarget>
        <div class="container justify-content-center align-items-center">
            <div class="row">
                <div class="col-md d-none d-md-block">
                    <img src="/assets/images/bg/bg1.jpg" alt="images" style="max-width: 500px">
                </div>
                <div class="col-md">
                    <h1 class="auth-title mt-5">Arsip Digital</h1>
                    <p class="auth-subtitle">Masuk dengan akun terdaftar.</p>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @env('local')
        <script src="<http://localhost:35729/livereload.js>"></script>
        @endenv

    </div>
</body>

</html>
