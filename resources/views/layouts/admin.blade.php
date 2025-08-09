<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main, .container, .content-highlight {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/storage/uploads/logo.png" alt="Logo" class="logo-navbar" style="height:40px; width:auto; max-width:160px; object-fit:contain; display:block;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-center mx-auto mb-2 mb-lg-0" style="width: 100%;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <form class="d-flex" role="search" method="GET" action="{{ url('/') }}">
                <div class="input-group search-navbar">
                  <input class="form-control rounded-start border-end-0 shadow-none" type="search" name="q" placeholder="Tìm kiếm..." aria-label="Search" value="{{ request('q') }}">
                  <button class="btn btn-success rounded-end px-4" type="submit" style="box-shadow:0 2px 8px rgba(34,197,94,0.10); font-weight:500;">Tìm</button>
                </div>
              </form>
            </form>
    <style>
        .search-navbar .form-control {
            border-radius: 20px 0 0 20px !important;
            border-color: #198754;
            box-shadow: 0 2px 8px rgba(34,197,94,0.08);
            transition: box-shadow 0.2s, border-color 0.2s;
        }
        .search-navbar .form-control:focus {
            border-color: #198754;
            box-shadow: 0 4px 16px rgba(34,197,94,0.18);
        }
        .search-navbar .btn-success {
            border-radius: 0 20px 20px 0 !important;
            font-weight: 500;
        }
        @media (max-width: 991.98px) {
            .search-navbar .form-control, .search-navbar .btn-success {
                border-radius: 20px !important;
            }
        }
    </style>
          </div>
        </div>
      </nav>
    </header>
    <div class="container mt-5">
        @yield('content')
    </div>
    <footer class="bg-body-tertiary text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2020 Copyright:
    <a class="text-body" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>