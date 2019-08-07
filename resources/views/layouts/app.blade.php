<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <!-- Bootstrap core CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Material Design Bootstrap -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet"> --}}
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/solid.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css" type="text/css"> --}}
  </head>
  <body>
    <div id="app" class="animated fadeIn">
      <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light p-2">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('avatar/logo.png') }}" alt="">
            {{-- {{ config('app.name', 'Laravel') }} --}}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
              <!-- Authentication Links -->
              @guest
                <li class="nav-item">
                  <a class="nav-link text-info" href="{{ route('login') }}"><i class="fas fa-arrow-circle-right"></i> {{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-danger mr-0" href="{{ route('employer.register') }}"><i class="fas fa-building"></i> {{ __('Employer Register') }}</a>
                </li>
                @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('register') }}"><i class="fas fa-user"></i> {{ __('Job Seeker Register') }}</a>
                  </li>
                @endif
              @else
                @if (Auth::user()->user_type=='employer')
                <li class="nav-item">
                  <a href="{{ route('jobs.create') }}" class="nav-link">Post a job</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if (Auth::user()->user_type=="employer")
                      {{ Auth::user()->company->cname }} 
                    @else
                      {{ Auth::user()->name }} 
                    @endif
                    <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->user_type=='employer')
                      <a href="{{ route('company.view') }}" class="dropdown-item">Company</a>
                      <a href="{{ route('jobs.myjobs') }}" class="dropdown-item">My Jobs</a>
                      <a href="{{ route('applicants') }}" class="dropdown-item">My applicants</a>
                    @else
                      <a href="{{ route('profile.view') }}" class="dropdown-item">Profile</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>

      <main class="mt-4">
      @yield('content')
      </main>
    </div>

<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 mt-3">


  <hr>

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h5 class="mb-1">Register for free</h5>
    </li>
    <li class="list-inline-item">
      <a href="{{ route('register') }}" class="btn btn-danger btn-rounded">Sign up as a seeker</a>
      <a href="{{ route('employer.register') }}" class="btn btn-danger btn-rounded">Singn up as an employer</a>
    </li>
  </ul>
  <!-- Call to action -->

  <hr>

  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a class="btn-floating btn-fb mx-1">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-tw mx-1">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-gplus mx-1">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-li mx-1">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="">David Basil</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <!-- JQuery -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <!-- Bootstrap tooltips --> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> --}}
    {{-- <!-- Bootstrap core JavaScript --> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <!-- MDB core JavaScript --> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
    @stack('scripts') 
  </body>
</html>
