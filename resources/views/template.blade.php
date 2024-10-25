<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Portofolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-light shadow py-3 mb-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-medium active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-medium" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-medium" href="#skills">Skill</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-medium" href="#projects">Projek</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-medium" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="my-4">
        @yield('content')
    </main>

    <footer>
        <p class="text-muted text-center">Copyright &copy; Portofolio <b>Wildan M Zaki</b></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
</body>
</html>