<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Koperasi SMKN 1 Cimahi | @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('sidebars.css') }}">
        <script src="{{ asset('assets') }}/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('sidebars.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets') }}/dist/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('assets') }}/dist/js/bootstrap.js"></script> 
        <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
</head>
<body>
    <!-- h-100 takes the full height of the body-->
    <div class="container-fluid h-100">
        <!-- h-100 takes the full height
                of the container-->
        <div class="row h-100">
            <div class="col-2 pl-1 " style="padding: 0;">
            <div class="flex-shrink-0 p-3 " style="height:100vh; background-color: #E8EBED;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <img class="bi me-2" src="{{ asset('image') }}/koperasi.png" width="40" height="40"></img>
      <span class="fs-6 fw-semibold">KOPERASI<br>SMKN 1 CIMAHI</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed " data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Dashboard
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Weekly</a></li>
            <li><a href="#" class="link-dark rounded">Monthly</a></li>
            <li><a href="#" class="link-dark rounded">Annually</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Orders
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New</a></li>
            <li><a href="#" class="link-dark rounded">Processed</a></li>
            <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New...</a></li>
            <li><a href="#" class="link-dark rounded">Profile</a></li>
            <li><a href="#" class="link-dark rounded">Settings</a></li>
            <li><a href="#" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

            </div>
            <div class="col-10" style="padding: 0;">
                <!-- Top navbar -->
                <nav class="navbar navbar-expand-lg navbar-light px-3" style="background-color:#65A834">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <!-- Hamburger button that toggles the navbar-->
                    <button class="navbar-toggler" type="button"
                        data-toggle="collapse"
                        data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- navbar links -->
                    <div class="collapse navbar-collapse"
                        id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link
                                active" href="#">
                               Home
                              </a>
                            <a class="nav-item nav-link" href="#">Features</a>
                            <a class="nav-item nav-link" href="#">Price</a>
                            <a class="nav-item nav-link" href="#">About</a>
                        </div>
                    </div>
                </nav>
                <!-- Contains the main content of the webpage-->
                <p style="padding: 15px; text-align: justify;">
                    Bootstrap is a free and open-source
                    tool collection for creating responsive
                    websites and web applications.
                    It is the most popular HTML, CSS, and
                    JavaScript framework for developing
                    responsive, mobile-first web sites.
                </p>
 
            </div>
        </div>
    </div>
</body>
</html>