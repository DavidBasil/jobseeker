@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if (session('message'))
          <div class="card">
            <div class="card-body">
              <p class="card-text">{{ session('message') }}</p>
            </div>
          </div>
        @endif

        <div class="card border-light">
          <div class="card-header text-center text-dark bg-light border-left-0 border-right-0 mb-4">{{ __('LOGIN') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="md-form">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="md-form">
                <label for="password" class="mt-3">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="row">
                <div class="col-md-6 text-center">
                  <div class="form-check">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
                <div class="col-md-6 text-center border-left">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link p-0 m-0" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>

              <button type="submit" class="btn btn-outline-info btn-block mt-4 rounded-pill">
                {{ __('Login') }}
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
