<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Website Wisata</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://disbudporapar.sumenepkab.go.id/">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-white text-center p-3 mt-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container d-flex justify-content-center">
                <ul class="navbar-nav d-flex" style="flex-direction: row;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://disbudporapar.sumenepkab.go.id/">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <hr>
        <span style="color: #aaa">
            Copyright © 2023 Website Travel - All Right Reserved
        </span>
    </footer>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
