<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo width="72" height="72" />
          </a>
      </x-slot>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email Address -->
          <div>
              <x-label for="email" :value="__('Email')" />

              <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
          </div>

          <!-- Password -->
          <div class="mt-4">
              <x-label for="password" :value="__('Password')" />

              <x-input id="password" type="password" name="password" required autocomplete="current-password" />
          </div>

          <!-- Remember Me -->
          <div class="form-check mt-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">
              {{ __('Remember me') }}
            </label>
          </div>

          <div class="flex items-center justify-end">
              <x-button class="mt-4">
                  {{ __('Login') }}
              </x-button>

              @if (Route::has('password.request'))
                <a class="d-block mt-4" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
                </a>
              @endif
              <a class="d-block" href="{{ route('register') }}">
                {{ __('Not Registered?') }}
              </a>
          </div>
      </form>
  </x-auth-card>
</x-guest-layout>

{{-- @extends('layouts.guest')

@section('styles')
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}" class="form-signin text-center">
    @csrf

    <img class="mb-4" src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">
        Please sign in
    </h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <input id="email" type="email" name="email" :value="old('email')" class="form-control" placeholder="Digite seu email" required autofocus >

    <input id="password" type="password" name="password" class="form-control" placeholder="Digite sua senha" required autocomplete="current-password">

    <!-- Remember Me -->
    <div class="checkbox mb-3">
        <label for="remember_me">
            <input id="remember_me" name="remember" type="checkbox">
            <span>{{ __('Remember me') }}</span>
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
        {{ __('Login') }}
    </button>

    <div class="d-flex justify-content-between">
        @if (Route::has('password.request'))
            <div class="mt-4">
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('register') }}">
                {{ __('Not registered?') }}
            </a>
        </div>
    </div>

    <p class="mt-4 mb-3 text-muted">© 2017-2020</p>
</form>
@endsection --}}
