<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo width="72" height="72" />
          </a>
      </x-slot>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-3" :errors="$errors" />

      <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- Name -->
          <div>
              <x-label for="name" :value="__('Name')" />

              <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
          </div>

          <!-- Email Address -->
          <div class="mt-3">
              <x-label for="email" :value="__('Email')" />

              <x-input id="email" type="email" name="email" :value="old('email')" required />
          </div>

          <!-- Password -->
          <div class="mt-3">
              <x-label for="password" :value="__('Password')" />

              <x-input id="password" type="password" name="password" required autocomplete="new-password" />
          </div>

          <!-- Confirm Password -->
          <div class="mt-3">
              <x-label for="password_confirmation" :value="__('Confirm Password')" />

              <x-input id="password_confirmation" type="password" name="password_confirmation" required />
          </div>

          <div class="mt-4">
              <x-button class="">
                  {{ __('Register') }}
              </x-button>
              <a class="d-block mt-3" href="{{ route('login') }}">
                  {{ __('Already registered?') }}
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
    <div class="container w-25 d-flex flex-column text-center">
        <div class="mb-4">
            <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" alt="Logo" width="72" height="72">
        </div>
        <h1 class="h3 mb-3 font-weight-normal">
            Register
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="needs-validation">
            @csrf

            <!-- Name -->
            <div class="mb-3 text-left">
                <label for="name">Nome <span class="text-muted">(Obrigatório)</span></label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Peter Parker" required autofocus>
                <div class="invalid-feedback">
                    Este campo é obrigatório.
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3 text-left">
                <label for="email">E-Mail <span class="text-muted">(Obrigatório)</span></label>
                <input id="email" name="email" type="text" class="form-control" placeholder="peterparker@dailybugle.com" required>
                <div class="invalid-feedback">
                    Insira um e-mail válido.
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3 text-left">
                <label for="password">Senha <span class="text-muted">(Obrigatório)</span></label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Digite uma senha" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 text-left">
                <label for="password_confirmation">Confirmar Senha <span class="text-muted">(Obrigatório)</span></label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirme sua senha" required>
            </div>

            <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">
                {{ __('Register') }}
            </button>

            <a class="" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <p class="mt-4 mb-3 text-muted">© 2017-2020</p>

        </form>
    </div>
@endsection --}}
